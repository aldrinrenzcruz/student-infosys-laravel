@extends('layouts.app')

@section('content')
  <section class="container" style="margin-top: 10vh;min-height: 70vh;">
    <h1>Edit User</h1>
    @if ($errors->any())
      <div class="alert alert-danger">
      <ul class="mb-0">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
      </ul>
      </div>
    @endif
    <form action="{{ route('users.edit', $user->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
      </div>
      <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
      </div>
      <div class="mb-3">
      <label>Role</label>
      <select class="form-control" name="role" id="role" required>
        <option value="" disabled>-- Select Role --</option>
        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="customer" {{ old('role', $user->role) == 'customer' ? 'selected' : '' }}>Customer</option>
      </select>
      </div>
      <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current password">
      <small class="form-text text-muted">Leave empty to keep the current password</small>
      </div>
      <div class="mb-3">
      <label>Photo</label>
      <input type="file" name="photo" class="form-control">
      @if($user->photo)
      <div class="mt-2">
        <p>Current photo:</p>
        <img src="{{ asset('storage/uploads/' . $user->photo) }}" width="100" height="100" class="rounded">
      </div>
      @endif
      </div>
      <button type="submit" class="btn btn-primary">Update User</button>
      <a href="{{ route('users.index') }}" class="btn btn-secondary">Go to index</a>
    </form>
  </section>
@endsection