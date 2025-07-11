@extends("layouts.app")

@section("content")
<section class="container" style="margin-top: 10vh;min-height: 70vh;">
  <h2 class="mb-4">Add User</h2>
  
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('users.add') }}" method="POST" enctype="multipart/form-data" class="w-100" style="max-width: 600px;">
    @csrf
    <div class="mb-3 text-start">
      <label for="name" class="form-label">Name</label>
      <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>
    
    <div class="mb-3 text-start">
      <label for="email" class="form-label">Email</label>
      <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    
    <div class="mb-3 text-start">
      <label for="role" class="form-label">Role</label>
      <select id="role" name="role" class="form-control" required>
        <option value="" disabled {{ old('role') ? '' : 'selected' }}>—Select Role—</option>
        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>Customer</option>
      </select>
    </div>
    
    <div class="mb-3 text-start">
      <label for="password" class="form-label">Password</label>
      <input type="password" id="password" name="password" class="form-control" required>
    </div>
    
    <div class="mb-3 text-start">
      <label for="photo" class="form-label">Photo</label>
      <input type="file" id="photo" name="photo" class="form-control">
    </div>
    
    <button type="submit" class="btn btn-primary">Add User</button>
    <a href="{{ route("users.index") }}" class="btn btn-secondary ms-2">Go to index</a>
  </form>
</section>
@endsection