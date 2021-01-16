<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferRequest;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Models\Transfer;
use Illuminate\Support\Facades\DB;



class TransferController extends Controller
{

    public function index()
    {
        $brands = Transfer::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('branch.transfer.index', compact('branch'));

    }

    public function create()
    {

        $data = Branch::all();

        return view('branch.transfer.create', compact('data'));


    }

    public function store(TransferRequest $request)
    {
       //return  $request;
        try {

             DB::beginTransaction();
            //validation

            //store
            $transfer = Transfer::create([
                'branch_id' => $request->branch_id,
                'sender_name' => $request->sender_name,
                'recipient_name' => $request->recipient_name,
                'amount' => $request->amount,
                'phone' => $request->phone,
            ]);


            // $transfer = Transfer::create($request->except('_token'));

            //save translations

           // $transfer->name = $request->name;
          //  $transfer->save();
            DB::commit();

            //return success message
            return redirect()->route('branch.transfer.create')->with(['success' => 'تم انشاء القسم بنجاح']);


        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('branch.transfer.create')->with(['error' => 'حدث خطا ما الرجاء المحاولة لاحقا']);

        }


    }

//{{--
//
//    public function edit($id)
//    {
//        //get specific category and itis translations
//        $brands = Brand::find($id);
//        if (!$brands)
//            return redirect()->route('admin.brands')->with(['error' => 'هذا القسم غير موجود']);
//        return view('dashboard.brands.edit', compact('brands'));
//    }
//
//    public function update($id, TransferRequest $request)
//    {
//        try {
//            //validation
//            //update database
//
//            $brands = Brand::find($id);
//            if (!$brands)
//                return redirect()->route('admin.brands')->with(['error' => 'هذا الماركة غير موجود']);
//
//            DB::beginTransaction();
//
//            if ($request->has('photo')) {
//                $fileName = uploadImage('brands', $request->photo);
//                Brand::where('id', $id)
//                    ->update([
//                        'photo' => $fileName
//                    ]);
//            }
//
//            if (!$request->has('is_active'))
//                $request->request->add(['is_active' => 0]);
//            else
//                $request->request->add(['is_active' => 1]);
//
//            $brands->update($request->except('_token', 'id', 'photo'));
//
//            //save translations
//            $brands->name = $request->name;
//            $brands->save();
//            DB::commit();
//            return redirect()->route('admin.brands')->with(['success' => 'تم التحديث بنجاح']);
//
//
//        } catch (\Exception $ex) {
//            return redirect()->route('admin.brands')->with(['error' => 'حدث خطا ما الرجاء المحاولة لاحقا']);
//
//
//        }
//
//    }
//
//    public function distroy($id)
//    {
//
//        try {
//            //validation
//            //update database
//            $brands = Brand::orderBy('id', 'DESC')->find($id);
//            if (!$brands)
//                return redirect()->route('admin.brands')->with(['error' => 'هذا القسم غير موجود']);
//            $brands->delete();
//
//            return redirect()->route('admin.brands')->with(['success' => 'تم الحذف بنجاح']);
//
//
//        } catch (\Exception $ex) {
//            DB::rollBack();
//            return redirect()->route('admin.brands')->with(['error' => 'حدث خطا ما الرجاء المحاولة لاحقا']);
//
//
//        }
//    }
//
//--}}

}





