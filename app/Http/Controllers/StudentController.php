<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController
{
    public function index()
    {
        $students =  Student::all();
        return view('students.index');
    }
    public function store()
    {
        return view('students.save');
    }
}
