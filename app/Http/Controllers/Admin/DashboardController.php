<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController
{
    public function dashboard()
    {
        // $count = Product::latest();
        $count = Product::count();
        // /return $count;
        return view('admin.dashboard', ['productCount' => $count]);
    }
}
