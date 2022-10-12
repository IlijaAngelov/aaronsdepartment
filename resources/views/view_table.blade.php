<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <title>Document</title>
</head>
<body>
<div class="container mt-5">
<a href="{{ url()->previous() }}" class="btn btn-primary mt-3 mb-3">Go Back</a>
  <table class="table table-striped">
      <thead>
          <tr class="table-success">
              <th scope="col">Employee</th>
              <th scope="col">View</th>
          </tr>
      </thead>
      <tbody>
          @foreach($users as $user)
          <tr>
              <td>{{ $user->Employee }}</td>
              <td>
                <form action="{{ route('view_employee') }}" method="POST">
                  @csrf
                  <button type="submit" id="id" name="name" value="{{ $user->Employee }}">View</button></td>
              </form>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
</body>
</html>