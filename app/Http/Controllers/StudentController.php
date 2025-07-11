<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
  public function index()
  {
    $students = Student::where('course', 'BSIT')
      ->orderBy('name', 'asc')
      ->get();

    return view('students', compact('students'));
  }
}
