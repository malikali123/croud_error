<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function  getLogin(){

        return view('admin.auths.login');
    }

    public function save(){

        $admin = new App\Models\Admin();
        $admin -> name ="Mohamed Siddig";
        $admin -> email ="mohamed@gmail.com";
        $admin -> password = bcrypt("12341234");
        $admin -> save();

    }

    public function login(LoginRequest $request){

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
           // notify()->success('تم الدخول بنجاح  ');
            return redirect()->intended(route("admin.dashboard"));
//            return redirect() -> route('admin.dashboard');
        }
       // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }

    public function logout(){
        auth()->guard('admin')->logout();
        return redirect()->route('get.admin.login');
    }
}

