<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\IdentityRequest;
use DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        $users = Admin::orderBy('id','desc')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {

        try {
            DB::beginTransaction();
            $checkEmail = Admin::where('email',$request->user_email)->get()->count();

            if ($checkEmail > 0 ){
                return redirect()->route('admin.users')->with(['error' => 'البريد الالكتروني موجود بالفعل .']);
            }

            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->user_email,
                'password' => bcrypt($request->user_pass),
            ]);


            $avatar = "";
            try{
                if ($request->file('photo')){

                    $avatar = $admin->id .".". @strtolower(end(explode('.',$_FILES['photo']['name'] )));
                    $path = $request->file('photo')->storeAs(
                        'admin',
                        $avatar
                    );

                    $avatar = $path;
                }else {
                    $avatar = "admin/0.png";
                }
            }catch (\Exception $ex){
                DB::rollback();
                return redirect()->route('admin.users')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
            }
            $admin->photo = $avatar;
            $admin->save();
            DB::commit();

            return redirect()->route('admin.users')->with(['success' => 'تم الحفظ بنجاح']);

        }catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.users')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    public function edit($id)
    {
        //get specific categories and its translations
        $user = Admin::where('id',$id)->get()[0];

        if (!$user)
            return redirect()->route('admin.users')->with(['error' => 'هذا المستخدم غير موجود ']);

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request)
    {

        try {
            DB::beginTransaction();
            $admin = Admin::find($request->id);

            $admin->name = $request->name;
            $admin->email = $request->user_email;
            if ($request->new_pass)
                $admin->passwprd = $request->new_pass;
            $avatar = "";
            try{
                if ($request->file('photo')){

                    $avatar = $admin->id .".". @strtolower(end(explode('.',$_FILES['photo']['name'] )));
                    $path = $request->file('photo')->storeAs(
                        'admin',
                        $avatar
                    );

                    $avatar = $path;
                }else {
                    $avatar = $admin->photo;
                }
            }catch (\Exception $ex){
                DB::rollback();
                return $ex;
            }
            $admin->photo = $avatar;
            $admin->save();
            DB::commit();

            return redirect()->route('admin.users')->with(['success' => 'تم تحديث بيانات المستخدم    بنجاح']);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.users')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    public function destroy($id)
    {

        try {
            $language = Admin::find($id);
            if (!$language) {
                return redirect()->route('admin.users', $id)->with(['error' => 'هذه المستخدم غير موجوده']);
            }
            $language->delete();

            return redirect()->route('admin.users')->with(['success' => 'تم حذف المستخدم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.users')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

}
