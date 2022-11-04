<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        $designations = Designation::get();
        $branches = Branch::get();

        return view('dashboard.admin.create', compact('designations','branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string',
            // 'phone' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'designation' => 'required|numeric|min:0',
            'branch' => 'required|numeric|min:0'
        ]);

//        $role = Role::where('role_name', 'admin')->firstorFail();
        $designation = Designation::where('designation_id', $request['designation'])->firstorFail();
        $branch = Branch::where('branch_id', $request['branch'])->firstorFail();

        $user = User::create([
            'username' => $request['fullname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => 2,
            'phone_number' => $request['phone'],
            'is_active' => 1
        ]);
        $user->emp_unique_id='000'.$user->id;
        $user->save();
//        return $user;

        $employee = Employee::create([
            'first_name' => $request['fullname'],
            'branch' => $branch->branch_id,
            'phone' => $request['phone'],
            'email' => $request['email'],
            'designation' => $designation->designation_id,
            'user_id' => $user->id
        ]);

        return redirect()->route('admin.create');
    }

    public function list()
    {
        $users = User::where('role', 2)
            ->leftJoin('employees', 'employees.user_id', 'users.id')
            ->leftJoin('branch','employees.branch','branch.branch_id')
            ->leftJoin('designations','employees.designation','designations.designation_id')
            ->where('users.is_active',1)
            ->get();
    //    return  $users;

        return view('dashboard.admin.list',compact('users'));
    }
}
