<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
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
        return view('dashboard.admin.list');
    }
}
