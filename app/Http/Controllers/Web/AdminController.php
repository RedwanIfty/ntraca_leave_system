<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        return view('dashboard.admin.create');
    }

    public function store(Request $request)
    {
        return $request;
    }

    public function list()
    {
        $users=User::where('role',2)
            ->leftJoin('employees','employees.user_id','users.id')
            ->leftJoin('branch','employees.branch','branch.branch_id')
            ->leftJoin('department','employees.department','department.department_id')
            ->where('users.is_active',1)
            ->get();
//        return  $users;
        return view('dashboard.admin.list',compact('users'));
    }
}
