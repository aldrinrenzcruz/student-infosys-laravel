@extends("layouts.app")

@section("content")
  <section class="container" style="margin-top: 10vh;min-height: 70vh;">
    <h1>Create Student</h1>
    <form action="{{ route("students.add") }}" method="POST">
      @csrf
      <div class="mb-3">
        <label label>Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Type</label>
        <input type="text" name="type" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Add Student</button>
    </form>
  </section>
@endsection