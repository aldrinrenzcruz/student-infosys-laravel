<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BSIT Students</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      background-color: #f5f5f5;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #333;
      text-align: center;
      border-bottom: 2px solid #007bff;
      padding-bottom: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
    }

    th {
      background-color: #007bff;
      color: white;
      font-weight: bold;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    .count {
      background-color: #28a745;
      color: white;
      padding: 10px;
      border-radius: 5px;
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>BSIT Students List</h1>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Course</th>
          <th>Created At</th>
          <th>Updated At</th>
        </tr>
      </thead>
      <tbody>
        @forelse($students as $student)
      <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->course }}</td>
        <td>{{ $student->created_at->format('Y-m-d H:i:s') }}</td>
        <td>{{ $student->updated_at->format('Y-m-d H:i:s') }}</td>
      </tr>
    @empty
      <tr>
        <td colspan="5" style="text-align: center; color: #666;">No BSIT students found.</td>
      </tr>
    @endforelse
      </tbody>
    </table>
  </div>
</body>

</html>