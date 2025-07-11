@extends("layouts.app")

@section("content")
  <section class="container" style="margin-top: 10vh;min-height: 70vh;">
    <h1>Edit Student</h1>
    <form action="{{ route("students.edit") }}" method="POST">
      @csrf
      @method("PUT")
      <input type="hidden" name="id" value="{{ $post->id }}">
      <div class="mb-3">
        <label label>Name</label>
        <input type="text" name="name" value="{{ $post->name }}" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Type</label>
        <input type="text" name="type" value="{{ $post->type }}" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Update Student</button>
    </form>
  </section>
@endsection