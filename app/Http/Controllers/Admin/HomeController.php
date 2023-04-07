<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

class HomeController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('admin.home');
    }
    public function login()
    {
        return view('admin.login');
    }
}
