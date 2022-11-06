<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $designations = Designation::get();
        $branches = Branch::get();

        /*
        | if user is superadmin, then they can add both admin and employees.
        | admins can only add employees.
        | role id 1 is assigned to superadmin.
        | role id 2 is assigned to admin.
        | role id 3 is assigned to employee.
        */
        $authRole = auth()->user()->role;
        if ($authRole == '1') {
            $roles = Role::whereIn('role_id', [2, 3])->get();
        } elseif ($authRole == '2') {
            $roles = Role::whereIn('role_id', [3])->get();
        } else {
            $roles = [];
        }

        return view('dashboard.employee.create', compact('designations', 'branches', 'roles'));
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
            'branch' => 'required|numeric|min:0',
            'role' => 'required|numeric|min:0|max:3',
        ]);

        // check if role, designation, branch is valid or not.
        Role::where('role_id', $request['role'])->firstorFail();
        Designation::where('designation_id', $request['designation'])->firstorFail();
        Branch::where('branch_id', $request['branch'])->firstorFail();

        $user = User::create([
            'username' => $request['fullname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
            'phone_number' => $request['phone'],
            'is_active' => 1,
            'profile_pic' => '',
        ]);
        $user->emp_unique_id = '000' . $user->id;
        $user->save();

        $employee = Employee::create([
            'first_name' => $request['fullname'],
            'branch' => $request['branch'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'designation' => $request['designation'],
            'user_id' => $user->id,
        ]);

        Session::flash('success', 'ব্যবহারকারী তৈরি করা হয়েছে');
        return redirect()->route('employee.create');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->firstorFail();
        $employee = Employee::where('user_id', $id)->firstorFail();

        $designations = Designation::get();
        $branches = Branch::get();
        $roles = Role::where('role_id', $user->role)->get();

        return view('dashboard.employee.edit', compact('user', 'employee', 'designations', 'branches', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required|string',
            // 'phone' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'phone' => 'required',
            'email' => 'required|email',
            'designation' => 'required|numeric|min:0',
            'branch' => 'required|numeric|min:0',
            'role' => 'required|numeric|min:0|max:3',
        ]);

        $user = User::where('id', $id)->firstorFail();
        $employee = Employee::where('user_id', $id)->firstorFail();

        // check if role, designation, branch is valid or not.
        Role::where('role_id', $request['role'])->firstorFail();
        Designation::where('designation_id', $request['designation'])->firstorFail();
        Branch::where('branch_id', $request['branch'])->firstorFail();

        $user->username = $request['fullname'];
        $user->phone_number = $request['phone'];
        $user->email = $request['email'];
        $user->role = $request['role'];
        $user->save();

        $employee->first_name = $request['fullname'];
        $employee->branch = $request['branch'];
        $employee->phone = $request['phone'];
        $employee->email = $request['email'];
        $employee->designation = $request['designation'];
        $employee->save();

        Session::flash('success', 'তথ্য হালনাগাদ সম্পন্ন হয়েছে।');
        return redirect()->back();
    }

    public function show($id)
    {
        $user = User::where('id', $id)->firstorFail();
        $employee = Employee::where('user_id', $id)->firstorFail();
        $role = Role::where('role_id', $user->role)->firstorFail();
        $designation = Designation::where('designation_id', $employee->designation)->firstorFail();
        $branch = Branch::where('branch_id', $employee->branch)->firstorFail();

        return view('dashboard.employee.show', compact('user', 'role', 'designation', 'branch'));
    }

    public function list()
    {
        $listTitle = 'কর্মকর্তা/কর্মচারী তালিকা';

        $users = User::where('role', 3)
            ->leftJoin('employees', 'employees.user_id', 'users.id')
            ->leftJoin('branch', 'employees.branch', 'branch.branch_id')
            ->leftJoin('designations', 'employees.designation', 'designations.designation_id')
            ->where('users.is_active', 1)
            ->get();

        return view('dashboard.employee.list', compact('users', 'listTitle'));
    }

    public function profile()
    {
        $user = User::leftJoin('employees', 'employees.user_id', 'users.id')
            ->leftJoin('branch', 'employees.branch', 'branch.branch_id')
            ->leftJoin('designations', 'employees.designation', 'designations.designation_id')
            ->leftJoin('role', 'role.role_id', 'users.role')
            ->find(auth()->user()->id);

        //        return $user;
        return view('dashboard.employee.profile', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->firstorFail();
        $employee = Employee::where('user_id', $id)->firstorFail();

        $user->delete();
        $employee->delete();

        Session::flash('success', 'ব্যবহারকারীর তথ্য মুছে ফেলা হয়েছে।');

        return redirect()->back();
    }
}
