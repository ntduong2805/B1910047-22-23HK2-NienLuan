<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminController extends BaseController
{
    use AuthorizesRequests, Dispatchable, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
        $admin_nav = config('nav.admin');
        View::share('admin_nav', $admin_nav);
    }
}
