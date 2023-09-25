<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use DataTables;

class TodoController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Todo::latest()->get();
           

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct" onclick="editFunc(' . $row->id . ')">Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct" onclick="deleteFunc(' . $row->id . ')">Delete</a>';


                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        return view('todo.index');
    }
}
