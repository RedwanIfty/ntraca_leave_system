<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DesignationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $designations = Designation::orderBy('designation_name')->get();

        return view('dashboard.designation.index', compact('designations'));
    }

    public function create()
    {
        return view('dashboard.designation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:designations,designation_name',
        ]);

        Designation::create([
            'designation_name' => $request['name'],
        ]);

        Session::flash('success', 'created');
        return redirect()->route('designation.create');
    }

    public function show($id)
    {
        abort(404);
    }

    public function edit($id)
    {
        $designation = Designation::where('designation_id', $id)->firstorFail();

        return view('dashboard.designation.edit', compact('designation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:designations,designation_name',
        ]);

        $designation = Designation::where('designation_id', $id)->firstorFail();

        $designation->designation_name = $request['name'];
        $designation->save();

        Session::flash('success', 'updated');
        return redirect()->route('designation.index');
    }

    public function destroy($id)
    {
        $designation = Designation::where('designation_id', $id)->firstorFail();

        // Delete All user of this Designation
        // Delete Designation
        return $designation;
    }
}
