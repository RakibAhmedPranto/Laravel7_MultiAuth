<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;

    use AuthenticatesUsers;

    public function loginPage(){
        if(View::exists('admin.auth.login'))
        {
            return view('admin.auth.login');
        }
        abort(404);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
