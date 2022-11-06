<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Employee;
use App\Models\User;
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
        $userCount = User::whereIn('role', [2, 3])->count();
        $leaveCount = Application::Where('status', '2')
            ->where('approved_start_date', '<=', Carbon::now()->format('Y-m-d'))
            ->where('approved_end_date', '>=', Carbon::now()->format('Y-m-d'))
            ->count();
        $workingCount = $userCount - $leaveCount;

        $myLeave = '';
        $emp = Employee::where('user_id', auth()->user()->id)->first();
        if ($emp) {
            $myLeave = Application::select('employee_id', 'approved_total_days')
                ->where('employee_id', $emp->id)
                ->where('status', 2)
                ->whereYear('end_date', Carbon::now())
                ->get();
        }

        // return $myLeave->sum('approved_total_days');
        return view('dashboard.index', compact('myLeave', 'leaveCount', 'workingCount'));
    }

    public function getNotification(Request $r)
    {
        $emp = Employee::select('id', 'first_name')
            ->where('user_id', auth()->user()->id)
            ->first();

        $applications = Application::select('applications.*', 'employees.first_name')
            ->leftJoin('application_status', 'application_status.id', 'applications.status')
            ->leftJoin('employees', 'employees.id', 'applications.employee_id')
            ->where('applications.approval_id', $emp->id)
            ->where('applications.status', 1)
            ->get();
        $total = Application::leftJoin('employees', 'employees.id', 'applications.employee_id')
            ->where('applications.approval_id', $emp->id)
            ->where('applications.status', 1)
            ->count();
        //        return $total;
        return view('dashboard.notification', compact('applications', 'total'));
    }
}
