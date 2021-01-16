<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Client;
use App\Models\Nationality;
use App\Models\Privacy;
use App\Models\Visa;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // return \Storage::path('');
        return view('index');
    }

    public function about(Request $request)
    {
        $default_lang = app()->getLocale();
        $abouts = About::where('translation_lang', $default_lang)
            ->selection()
            ->orderBy('id','DESC')
            ->get();
        return view('front.about',compact('abouts'));
    }

    public function privacy(Request $request)
    {
        $default_lang = app()->getLocale();
        $abouts = Privacy::where('translation_lang', $default_lang)
            ->selection()
            ->orderBy('id','DESC')
            ->get();
        return view('front.privacy',compact('abouts'));
    }

    public function applyCountry($lang,$country_id,Request $request)
    {
        $default_lang = app()->getLocale();
        $abouts = About::where('translation_lang', $default_lang)
            ->selection()
            ->orderBy('id','DESC')
            ->get();
        return view('front.apply',compact('abouts','country_id'));
    }

    public function apply(Request $request)
    {

        $default_lang = app()->getLocale();
        $abouts = About::where('translation_lang', $default_lang)
            ->selection()
            ->orderBy('id','DESC')
            ->get();
        return view('front.apply',compact('abouts'));
    }

    public function apply_save(Request $request)
    {
        $visa_apply = ["country" => $request->country, "nationality" => $request->nationality, "identity" => $request->identity];
        return view('front.arrival_date',compact('visa_apply'));
    }


    public function arrival_create($lang , $visa_apply)
    {
        return view('front.prerequired',compact('visa_apply'));
    }


    public function arrival(Request $request)
    {
        $visa_apply = $request->except('_token');
        $exit_date = Carbon::createFromDate($request->arrival_date);
        $exit_date->addDays(Nationality::find($request->nationality)->visa_duration);
        $visa_apply['enddate'] = substr($exit_date,0,10) ;
        return view('front.prerequired',compact('visa_apply'));
    }

    public function prerequired(Request $request)
    {
        $visa_apply = $request->except(['_token','prequired']);

        return view('front.personalinfo',compact('visa_apply'));
    }

    public function personal(Request $request)
    {
        $visa_apply = $request->except(['_token','person']);
        $clients = $request->except(['_token','nationality','arrival_date','identity','country','enddate']);

        try{
            DB::beginTransaction();



            $client = Client::create($clients['person']);

            $visa = Visa::create([
                'oder_number' => Visa::order_number(),
                'client_id' => $client->id,
                'nationality_of' => $request->nationality,
                'identity_of' => $request->identity,
                'country_of' => $request->country,
                'arrival_date' => $request->arrival_date,
                'expiration_date' => $request->enddate,
                'visa_price' => Nationality::find($request->nationality)->visa_price,
            ]);

            DB::commit();
            \Mail::to($client->email)->send(new \App\Mail\SendVisaMail($visa));
            return redirect(route('payment',[app()->getLocale(),$visa-> oder_number]));
        }catch (\Exception $ex){
            DB::rollBack();
            return $ex;
            return redirect(route('home',app()->getLocale()));
        }

    }

    public function payment($lang,$id)
    {
        $visa_apply = Visa::where([['oder_number',$id]])->get()->first();



        if (!$visa_apply)
            return redirect(route('home',app()->getLocale()));

        if ($visa_apply->status != 1)
            return redirect(route('order.info',[app()->getLocale(),$visa_apply->oder_number]));

        return view('front.payment',compact('visa_apply'));
    }

    public function accept_payment(Request $request)
    {
        $visa = Visa::find($request->id);

        try{
            DB::beginTransaction();
            $payment = Payment::create([
                'client_id' => $visa->client_id,
                'visa_id' => $visa->id,
                'transaction_id' => $request->orderID,
                'price' => $request->visa_price,
            ]);

            if($payment){
                $visa->update([
                    'status' => 2,
                ]);
            }
            DB::commit();
            \Mail::to($visa->client->email,$visa->client->name)->send(new \App\Mail\PaymentNotificationMail($visa));
            return redirect(route('order.info',[app()->getLocale(),$visa->oder_number]));

            //DB::rollBack();
        }catch (\Exception $ex){
            DB::rollBack();

            return $ex;
            return redirect(route('home',app()->getLocale()));
        }

    }

    public function search_info(Request $request){
        $visa_apply = Visa::where([['oder_number',$request->order_number]])->get()->first();

        if (!$visa_apply)
            return redirect()->back()->with(['error' => 'Not Found 404 !']);

        if ($visa_apply->status == 1 ){
            return redirect(route('payment',[app()->getLocale(),$visa_apply->oder_number]));
        }

        if ($visa_apply)
            return redirect(route('order.info',[app()->getLocale(),$visa_apply->oder_number]));
        else
            return 0;
    }

    public function info1(){
        $visa_apply = Visa::where([['oder_number','11']])->get()->first();


        return view('front.info',compact('visa_apply'));
    }

    public function info($lang,$id){
        $visa_apply = Visa::where([['oder_number',$id]])->get()->first();

        if ($visa_apply->status == 1 ){
            return redirect(route('payment',[app()->getLocale(),$visa_apply-> oder_number]));
        }
        // if ($visa_apply)
            // return view('front.info',compact('visa_apply'));

        return view('front.info',compact('visa_apply'));
    }
}
