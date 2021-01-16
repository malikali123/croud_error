<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index(){
        // $current = Carbon::now();
        // // return $current->addHours(2)->toDateString();
        // return Employee::whereRaw('MONTH(assign_date) = ?', $current->month)->get();
         return view('admin.dashboard');
    }

    public function main(){
        // $current = Carbon::now();
        // // return $current->addHours(2)->toDateString();
        // return Employee::whereRaw('MONTH(assign_date) = ?', $current->month)->get();
         return view('index');
    }

    public function home(){
        return view('branch.dashboard');
    }


}

