<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Branch;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::all();
        return view('admin.emp.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Branch::all();
        return view('admin.emp.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            // check email if exiested .
            if(Employee::where('email',$request->email)->count() > 0 ){
                return redirect()->back()->with(['error' => 'عفواً . البريد الالكتروني تم إضافتة مسبقاً .     .'])->withInput();
            }

            $emp = Employee::create([
                'branch_id' => $request->branch_id,
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);

            // upload image if it's provided .
            if ($request->file('image')){
                $file = $request->file('image');
                $file->store('employee');
                $emp->update([
                    "image" => 'employee/'.$file->hashName(),
                ]);
            }
            DB::commit();
            return redirect()->route('admin.emp')->with(['success' => 'تم الحفظ بنجاح']);
        }catch(Exception $ex){
            return $ex;
            return redirect()->back()->with(['error' => 'عفواً . حدثت مشكلة الرجاء المحاولة لاحقاً .'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp = Employee::find($id);
        $data = Branch::all();
        return view('admin.emp.edit', compact('data','emp'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            DB::beginTransaction();
            
            $emp = Employee::find($request->id);


            $emp->update([
                'branch_id' => $request->branch_id,
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

            // update the password if passed .
            if($request->password){
                $emp->update([
                    'password' => Hash::make($request->password),
                ]);
            }
            // upload image if it's provided .
            if ($request->file('image')){
                $file = $request->file('image');
                $file->store('employee');
                $emp->update([
                    "image" => 'employee/'.$file->hashName(),
                ]);
            }
            DB::commit();
            return redirect()->route('admin.emp')->with(['success' => 'تم تحديث بيانات الموظف بنجاح']);
        }catch(Exception $ex){
            return $ex;
            return redirect()->back()->with(['error' => 'عفواً . حدثت مشكلة الرجاء المحاولة لاحقاً .'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        // auth()->user->branch->id
    }
}
