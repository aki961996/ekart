<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

class LoginController
{
    public function login()
    {
        return view('admin.login');
    }

    public function doLogin()
    {
        // return request()->all();
        $input = request()->only('username', 'password');


        if (auth()->guard('admin')->attempt($input, request('remember_me'))) {
            return redirect()->route('admin.dashboard')->with('message', 'Login success');
        } else {
            return redirect()->route('admin.login')->with('message', 'Login Invalid');
        }
    }

    public function logout()
    {

        auth()->guard('admin')->logout();
        return redirect()->route('admin.login')->with('message', 'Logout Success');
    }
}
