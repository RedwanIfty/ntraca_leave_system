<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $emp=Employee::where('user_id',auth()->user()->id)->first();
        $myLeave=Application::select('employee_id','approved_total_days')
            ->where('employee_id',$emp->id)
            ->where('status',2)
            ->whereYear('end_date',Carbon::now())->get();
//        return $myLeave->sum('approved_total_days');
        return view('dashboard.index',compact('myLeave'));
    }

    public function getNotification(Request $r){
        $emp=Employee::select('id','first_name')->where('user_id',auth()->user()->id)->first();

        $applications =Application::select("applications.*","employees.first_name")
            ->leftJoin('application_status','application_status.id','applications.status')
            ->leftJoin('employees','employees.id','applications.employee_id')
            ->where('applications.approval_id',$emp->id)
            ->where('applications.status',1)
            ->get();
        $total=Application::leftJoin('employees','employees.id','applications.employee_id')
            ->where('applications.approval_id',$emp->id)
            ->where('applications.status',1)
            ->count();
//        return $total;
        return view('dashboard.notification',compact('applications','total'));
    }
}
