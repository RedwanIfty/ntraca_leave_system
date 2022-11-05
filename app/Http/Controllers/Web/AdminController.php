<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $listTitle = 'অ্যাডমিন তালিকা';

        $users = User::where('role', 2)
            ->leftJoin('employees', 'employees.user_id', 'users.id')
            ->leftJoin('branch', 'employees.branch', 'branch.branch_id')
            ->leftJoin('designations', 'employees.designation', 'designations.designation_id')
            ->where('users.is_active', 1)
            ->get();

        return view('dashboard.employee.list', compact('users', 'listTitle'));
    }
}
