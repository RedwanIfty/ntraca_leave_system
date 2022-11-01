<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::orderBy('branch_id', 'DESC')->get();

        return view('dashboard.branch.index', compact('branches'));
    }

    public function create()
    {
        return view('dashboard.branch.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:branch,branch_name',
        ]);

        Branch::create([
            'branch_name' => $request['name'],
        ]);

        Session::flash('success', 'created');
        return redirect()->route('branch.index');
    }

    public function show($id)
    {
        abort(404);
    }

    public function edit($id)
    {
        $branch = Branch::where('branch_id', $id)->firstorFail();

        return view('dashboard.branch.edit', compact('branch'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:branch,branch_name',
        ]);

        $branch = Branch::where('branch_id', $id)->firstorFail();

        $branch->branch_name = $request['name'];
        $branch->save();

        Session::flash('success', 'updated');
        return redirect()->route('branch.index');
    }

    public function destroy($id)
    {
        $branch = Branch::where('branch_id', $id)->firstorFail();

        // Delete user associated with this branch
        // delete branch
        return $branch;
    }
}
