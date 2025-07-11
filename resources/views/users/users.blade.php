@extends("layouts.app")

@section("content")
  <section class="container" style="margin-top: 10vh;min-height: 70vh;">
    <a href="{{ route('users.add.form') }}" class="btn btn-success float-start mb-3">Add User</a>
    <table class="table table-dark table-striped table-bordered align-middle text-center">
    <thead>
      <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Type</th>
      <th>Image</th>
      <th>Created Date</th>
      <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
      <td>{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->role }}</td>
      <td>
      <img src="{{ $user->photo }}" width="50" height="50" class="rounded-circle">
      </td>
      <td>{{ \Carbon\Carbon::parse($user->created_at)->format('F d, Y, gA') }}</td>
      <td>
      <div class="d-flex justify-content-center gap-2">
      <a href="{{ route('users.edit.form', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
      <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{ $user->id }}">Delete</button>
      </div>
      </td>
      </tr>
    @endforeach
    </tbody>
    </table>
  </section>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-btn').forEach(button => {
      button.addEventListener('click', function () {
        const userId = this.getAttribute('data-id');

        Swal.fire({
          title: 'Are you sure?',
          text: "This action cannot be undone!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'Cancel'
        }).then((result) => {
          if (result.isConfirmed) {
            fetch(`/users/delete/${userId}`, {
              method: 'DELETE',
              headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
              }
            })
              .then(response => response.json())
              .then(data => {
                Swal.fire('Deleted!', data.success, 'success')
                  .then(() => window.location.reload());
              })
              .catch(error => {
                Swal.fire('Error', 'Something went wrong!', 'error');
              });
          }
        });
      });
    });
  });
</script>