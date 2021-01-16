<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use DB;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Branch::where("id","!=",0)->get();

        return view('admin.branch.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $admin = Branch::create([
                'name' => $request->name,
            ]);
            DB::commit();

            return redirect()->route('admin.branch')->with(['success' => 'تم الحفظ بنجاح']);

        }catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.users')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $jobTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editJob = Branch::find($id);
        $data = Branch::where("id","!=",0)->get();
        return view('admin.branch.index', compact('data','editJob'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $jobTitle)
    {
        try {
            DB::beginTransaction();

            Branch::find($request->id)->update([
                "name" => $request->name,
            ]);
            
            DB::commit();
            return redirect()->route('admin.branch')->with(['success' => 'تم التحدديث بنجاح']);

        }catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.branch')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $job = Branch::find($id);
            $job->delete();
            DB::commit();
            return redirect()->route('admin.branch')->with(['success' => 'تم الحذف بنجاح']);

        }catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.branch')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
