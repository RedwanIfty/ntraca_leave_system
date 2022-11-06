<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Branch;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ScanController extends Controller
{
    public function scanedUser($id){
        //
        $emp_id= Crypt::decrypt($id);
//        $parameter= Crypt::decrypt($id);
        $employee = Employee::where('id', $emp_id)->firstorFail();
        $user = User::where('id', $employee->user_id)->firstorFail();
        $role = Role::where('role_id', $user->role)->firstorFail();
        $designation = Designation::where('designation_id', $employee->designation)->firstorFail();
        $branch = Branch::where('branch_id', $employee->branch)->firstorFail();

        $applications=Application::where('employee_id',$employee->id)
            ->leftJoin('application_status','application_status.id','applications.status')
            ->get();

//        return $applications;

        return view('dashboard.employee.show_scanned', compact('user', 'role', 'designation', 'branch','applications'));

    }
}
