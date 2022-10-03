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
<div class="container mt-4">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
</div>
<div class="container mt-5">
    <a class="btn btn-default btn-primary mb-2" href="{{ route('shift.create') }}">New Shift</a>
</div>
<div class="container mt-5">
    <form action="{{ route('view_total') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="filter" class="col-sm-2 col-form-label">Filter</label>
            <input type="text" class="form-control" id="filter" name="filter" placeholder="Filter Total...">
          </div>
          <button type="submit" class="btn btn-default btn-light mb-2">Filter</button>
    </form>
  <table class="table table-striped">
      <thead>
          <tr class="table-success">
              <th scope="col">Id</th>
              <th scope="col">Date</th>
              <th scope="col">Employee</th>
              <th scope="col">Employer</th>
              <th scope="col">Hours</th>
              <th scope="col">Rate Per Hour</th>
              <th scope="col">Taxable</th>
              <th scope="col">Status</th>
              <th scope="col">Shift Type</th>
              <th scope="col">Paid At</th>
              <th scope="col">Total Pay</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
          </tr>
      </thead>
      <tbody>
          @foreach($userTotal as $user)
          <tr>
              <th scope="row">{{ $user->id }}</th>
              <td>{{ $user->date }}</td>
              <td>{{ $user->employee }}</td>
              <td>{{ $user->employer }}</td>
              <td>{{ $user->hours }}</td>
              <td>{{ $user->rate_per_Hour }}</td>
              <td>{{ $user->taxable }}</td>
              <td>{{ $user->status }}</td>
              <td>{{ $user->shift_type }}</td>
              <td>{{ $user->paid_at }}</td>
              <td>{{ $user->total }}</td>
              <td><a href="{{ route('shift.edit', $user->id) }}" class="btn btn-default btn-light mb-2">Edit</a></td>
              <td><form action="{{ route('shift.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mb-2" type="submit">Delete</button>
            </form></td>
          </tr>
          @endforeach
      </tbody>
  </table>

  <div class="d-flex">
    {!! $userTotal->links() !!}
  </div>
</div>
</body>
</html>