<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function login_get()
    {
        return view("admin.login");
    }
    public function login_post()
    {
        $remember = request()->has("remember")?true:false;
        if (Auth::guard("admin")->attempt(['email' => request()->email, 'password' => request()->password],$remember))
        {
            return redirect("/");
        }else{
            return back();
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        return redirect('/admin/login');
    }
}
