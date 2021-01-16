<?php

namespace App\Http\Middleware;
use Request;

use Closure;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        env('MAIL_HOST', \App\Models\Setting::all()->first()->MAIL_HOST);
        // if (Request::is('admin/*')){
        //     return $next($request);
        // }else{
        //     if (\App\Models\Language::where('abbr',$request->language)->active() -> Selection() -> get() -> count() > 0){
        //         $language = $request->language;
        //     }else{
        //         $language = app()->getLocale();
        //     }
        //     if(isset($language) ){
        //         \App::setlocale($language);
        //     }
        // }

        return $next($request);
    }
}
