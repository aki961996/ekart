<?php

namespace App\Http\Controllers;

use App\Models\Demo;
use Illuminate\Http\Request;

class DemoController
{
    public function index()
    {
        return view('demo.index');
    }
    public function store(Request $request)
    {
        $demo_id = request('id');


        $demo = Demo::updateOrCreate(
            [
                'id'   => $demo_id,
            ],
            [
                'name' => $request->fname,
                'last_name' => $request->lname
            ]
        );
        //dd($demo);
        // return response()->json($demo);

        return response()->json([
            'status' => 200,
            'msg' => 'successfully inserted ',
            'data' => $demo
        ]);
    }
}
