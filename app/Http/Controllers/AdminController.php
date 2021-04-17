<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Model\Admin;
use Session;

class AdminController extends Controller
{
    public function dashboard(){
        if(View::exists('admin.dashboard'))
        {
            return view('admin.dashboard');
        }
        abort(404);
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.loginPage');
    }
    public function registerPage(){
        if(View::exists('admin.auth.register'))
        {
            return view('admin.auth.register');
        }
        abort(404);
    }
    public function register(Request $request){        
        $request->validate([
            'email' => 'required|unique:admins',
            'password' => 'required',
            'password_confirmation' => 'same:password',
        ]);
        
        $target = new Admin;
        $target->name = $request->name;
        $target->email = $request->email;
        $target->password = Hash::make($request->password);
        if ($target->save()) {
            Session::flash('success', 'Admin Created');
            return redirect()->route('admin.dashboard');
        } else {
            Session::flash('error','Admin Could Not be Created');
            return redirect()->back();
        }
    }
}
