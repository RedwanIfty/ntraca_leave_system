<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        $designations=Designation::get();
        $branches=Branch::get();
//        return $branches;
        return view('dashboard.admin.create',compact('designations','branches'));
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
            ->leftJoin('designations','employees.designation','designations.designation_id')
            ->where('users.is_active',1)
            ->get();
//        return  $users;
        return view('dashboard.admin.list',compact('users'));
    }
}
