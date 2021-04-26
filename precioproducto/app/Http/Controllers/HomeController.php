<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

//use Illuminate\Foundation\Auth\User as Authenticatable;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin','superadmin']);
        return view('private.home');
    }
/*
    public function someAdminStuff(Request $request)
    {
        $request->user()->authorizeRoles(‘admin’);
        return view(‘some.view’);
    }
    */
}
