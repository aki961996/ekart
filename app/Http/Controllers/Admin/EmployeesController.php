<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeesUpdateRequest;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController
{
    public function employees()
    {
        $employee = Employee::all();
        $departments = Department::all();
        //return $departments;

        return view('admin.employees.list', ['employee' =>  $employee], ['departments' => $departments]);
    }
    public function save()
    {
        // return request()->all();
        Employee::create([
            'name' => request('name'),
            'gender' => request('gender'),
            'dob' => date('Y-m-d', strtotime(request('dob'))),
            'address' => request('address'),
            'email' => request('email'),
            'mobile' => request('mobile'),
            'depertment_id' => request('depertment_id'),
            'designation_id' => request('designation_id'),
            'doj' => date('Y-m-d', strtotime(request('doj'))),
            'image' => request('image'),


        ]);

        return [
            'status' => 200,
            'message' => 'Employee created successfully'
        ];
    }

    public function fetchDesignation()
    {
        $designations = Designation::where('depertment_id', request('depertment_id'))->get();

        return [
            'status' => 200,
            'data' => $designations

        ];
    }

    public function editEmployees($id)
    {
        $id = request('id');
        $employeesId = Employee::find($id);

        // return $employeesId;
        return [
            'status' => 200,
            'message' => $employeesId
        ];
    }

    public function updateEmployees(Request $request)
    {

        // $id = $request->input('id');
        // $name = $request->input('name');
        // $gender = $request->input('gender');
        // $dob = $request->input('dob');
        // $address = $request->input('address');
        // $mobile = $request->input('mobile');
        // $email = $request->input('email');
        // $depertmentId = $request->input('depertmentId');
        // $designationId = $request->input('designationId');
        // $doj = $request->input('doj');
        // $image = $request->input('image');
        $data = [
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'dob' => date('Y-m-d', strtotime(request('dob'))),
            'address' => $request->input('address'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email'),
            'depertment_id' => $request->input('depertmentId'),
            'designation_id' => $request->input('designationId'),
            'doj' => date('Y-m-d', strtotime(request('doj'))),
            'image' => $request->input('image'),
        ];
        //dd($data);


        $employee = Employee::find($request->input('id'));
        // dd($employee);

        if ($employee) {
            // $employee->name = $name;
            // $employee->gender = $gender;
            // $employee->dob = $dob;
            // $employee->gender = $gender;
            // $employee->address = $address;
            // $employee->mobile = $mobile;
            // $employee->email = $emai757575475l;
            // $employee->depertmentId = $depertmentId;
            // $employee->designationId = $designationId;
            // $employee->image = $image;
            // $employee->doj = $doj;
            $employee->update($data);

            return response()->json([
                'message' => 'Employee updated successfully',
                'status' => 200,
                'data' => $employee
            ]);
        }
        return response()->json([
            'error' => 'Employee not found'
        ], 404);
    }
}
