<?php

namespace App\Http\Controllers\User;


use Illuminate\Http\Request;

class HomepageController
{
    public function home()
    {
        return view('users.home');
    }
}
