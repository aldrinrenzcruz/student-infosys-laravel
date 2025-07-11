<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
  public function index()
  {
    // $users = User::all();
    $users = User::orderBy("id", "desc")->get();
    return view("users.users", compact("users"));
  }

  public function create()
  {
    return view("users.add");
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'name'     => 'required|string|max:255',
      'email'    => 'required|email|unique:users,email',
      'role'     => 'required|in:admin,customer',
      'password' => 'required|string|min:6',
      'photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $fileName = null;

    if ($request->hasFile('photo')) {
      $file = $request->file('photo');
      $fileName = time() . '_' . $file->getClientOriginalName();
      $file->storeAs('public/uploads', $fileName);
    }

    User::create([
      'name'     => $validated['name'],
      'email'    => $validated['email'],
      'role'     => strtolower($validated['role']),
      'password' => bcrypt($validated['password']),
      'photo'    => $fileName,
    ]);

    return redirect()->route('users.index')->with('success', 'User account added successfully!');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    $user = User::findOrFail($id);
    return view("users.edit", compact("user"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    $user = User::findOrFail($id);

    $validated = $request->validate([
      'name'     => 'required|string|max:255',
      'email'    => 'required|email|unique:users,email,' . $user->id,
      'role'     => 'required|in:admin,customer',
      'password' => 'nullable|string|min:6',
      'photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $fileName = $user->photo;

    // Handle photo upload
    if ($request->hasFile('photo')) {
      // Delete old photo if it exists
      if ($user->photo && Storage::exists('public/uploads/' . $user->photo)) {
        Storage::delete('public/uploads/' . $user->photo);
      }

      // Upload new photo
      $file = $request->file('photo');
      $fileName = time() . '_' . $file->getClientOriginalName();
      $file->storeAs('public/uploads', $fileName);
      $validated['photo'] = $fileName;
    }

    // Update user data
    $updateData = [
      'name'  => $validated['name'],
      'email' => $validated['email'],
      'role'  => strtolower($validated['role']),
    ];

    // Only update password if provided
    if (!empty($validated['password'])) {
      $updateData['password'] = bcrypt($validated['password']);
    }

    // Add photo if uploaded
    if (isset($validated['photo'])) {
      $updateData['photo'] = $validated['photo'];
    }

    $user->update($updateData);

    return redirect()->route('users.index')->with('success', 'User updated successfully!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    $user = User::findOrFail($id);

    if ($user->photo && Storage::exists('public/uploads/' . $user->photo)) {
      Storage::delete('public/uploads/' . $user->photo);
    }

    $user->delete();
    return response()->json(['success' => 'User deleted successfully!']);
  }
}
