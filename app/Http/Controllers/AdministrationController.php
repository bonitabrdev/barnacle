<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }

    public function manageConstraints(Request $request)
    {
        return view('admin.constraints.manage');
    }

    public function manageUsers(Request $request)
    {
        return view('admin.users.manage');
    }

    public function manageSettings(Request $request)
    {
        return view('admin.settings.manage');
    }
}
