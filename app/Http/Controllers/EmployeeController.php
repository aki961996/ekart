<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;
use DataTables;

class EmployeeController
{
    public function index(Request $request)
    {

        $dep = Department::all();


        if ($request->ajax()) {

            // $data = Member::latest()->get();
            $data = Employee::all();
            // dd($data);

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

        return view('admin.employees.index', ['dep' => $dep]);
    }
    public function save(Request $request)
    {
        $employeId = request('id');
        $emp = Employee::updateOrCreate(
            [
                'id' => $employeId,
            ],
            [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'dob' => date('Y-m-d', strtotime($request->dob)),
                'gender' => $request->gender,
                'mobile' => $request->mobile,
                'depertment_id' => $request->depertment_id,
                'designation_id' => $request->designation_id,
                'doj' => date('Y-m-d', strtotime($request->doj)),
                'image' => $request->image,

            ]
        );
        return response()->json($emp);
    }

    public function fetchDesignation(Request $request)
    {
        $des = Designation::where('depertment_id', $request->depertmentId)->get();

        $response = [
            'status' => 200,
            'data' => $des
        ];
        return response()->json($response);
    }
}
