<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
  public function index()
  {
    $posts = DB::table("posts")->get();
    $users = DB::table("users")->where("id", 1)->first();
    return view("students.index", compact(["posts", "users"]));
  }

  public function view()
  {
    return view("students.view");
  }

  public function student()
  {
    return view("students.student_add");
  }

  public function student_add(Request $request)
  {
    DB::table("posts")->insert([
      "name" => $request->input("name"),
      "type" => $request->input("type"),
      "created_at" => now(),
      "updated_at" => now(),
    ]);
    return redirect()->route("index")->with("success", "Student added successfully!");
  }

  public function student_edit_form($id)
  {
    $post = DB::table("posts")->where("id", $id)->first();
    return view("students.student_edit", compact(["post"]));
  }

  public function student_edit(Request $request)
  {
    DB::table("posts")
      ->where("id", $request->input("id"))
      ->update([
        "name" => $request->input("name"),
        "type" => $request->input("type"),
        "updated_at" => now(),
      ]);

    return redirect()->route("index")->with("success", "Student updated successfully!");
  }

  public function student_delete($id)
  {
    DB::table("posts")->where("id", $id)->delete();
    return redirect()->route("index")->with("success", "Student deleted successfully!");
  }
}
