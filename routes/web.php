<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

Route::get("/", function () {
  return view("welcome");
})->name("home");

Route::get("/dashboard", function () {
  return view("dashboard");
})->middleware(["auth", "verified"])->name("dashboard");

Route::middleware("auth")->group(function () {
  Route::get("/profile", [ProfileController::class, "edit"])->name("profile.edit");
  Route::patch("/profile", [ProfileController::class, "update"])->name("profile.update");
  Route::delete("/profile", [ProfileController::class, "destroy"])->name("profile.destroy");



  Route::prefix("students")->name("students.")->controller(StudentController::class)->group(function () {
    Route::get("/", "index")->name("index");
    Route::get("/view", "student")->name("view");
    Route::post("/add", "student_add")->name("add");
    Route::get("/edit/{id}", "student_edit_form")->name("edit.form");
    Route::put("/edit", "student_edit")->name("edit");
    Route::delete("/delete/{id}", "student_delete")->name("delete");
  });

  Route::prefix("users")->name("users.")->controller(UserController::class)->group(function () {
    Route::get("/", "index")->name("index");                                   // show users data
    Route::get("/add", "create")->name("add.form");                            // show add form
    Route::post("/add", "store")->name("add");                                 // add data
    Route::get("/edit/{id}", "edit")->name("edit.form");                       // show edit form
    Route::put("/edit/{id}", "update")->name("edit");                          // edit data
    Route::delete("/delete/{id}", "destroy")->name("delete");                  // delete data
  });
});

Route::fallback(function () {
  return "Page not found.";
});

require __DIR__ . '/auth.php';
