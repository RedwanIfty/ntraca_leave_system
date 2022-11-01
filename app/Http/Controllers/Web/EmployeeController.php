<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function list()
    {
        $users=User::where('role',3)
            ->leftJoin('employees','employees.user_id','users.id')
            ->leftJoin('branch','employees.branch','branch.branch_id')
            ->leftJoin('designations','employees.designation','designations.designation_id')
            ->where('users.is_active',1)
            ->get();
//        return  $users;
        return view('dashboard.admin.list',compact('users'));
    }
}
