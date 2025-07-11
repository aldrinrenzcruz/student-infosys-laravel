@extends("layouts.app")

@section("title", "Students Module - Home")

@section("content")

@if(@session('success'))
<div class="alert alert-success">{{ session("success") }}</div>
@endsession

<section class="container" style="margin-top: 10vh;min-height: 70vh;">
  <h1>Welcome to the Students Module</h1>
  <p class="lead">This is your homepage where you can manage student profiles and perform related actions.</p>
     <a href="{{ route('students.view') }}" class="btn btn-success float-start mb-3">Add Student</a>
  <table class="table table-dark table-striped table-bordered align-middle">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Type</th>
        <th scope="col">Created At</th>
        <th scope="col" style="width: 180px;">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
      <tr>
      <th scope="row">{{ $post->id }}</th>
      <td>{{ $post->name }}</td>
      <td>{{ $post->type }}</td>
      <td>{{ \Carbon\Carbon::parse($post->created_at)->format("F d, Y, gA") }}</td>
      <td>
        <div class="d-flex justify-content-center gap-2">
        <a href="{{ route("students.edit.form", $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route("students.delete", $post->id) }}" method="POST" class="delete-form">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">
          Delete
          </button>
        </form>
        </div>
      </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</section>
@endsection