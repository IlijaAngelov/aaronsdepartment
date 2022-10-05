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
<div class="container md-5">
    <div>Employee Name: {{ $name['name'] }}</div>
    @foreach($average as $d)
    <div>Average pay per hour {{ $d->avg_per_hour }}</div>
    <div>Average Total Pay {{ $d->total_pay }}</div>
    @endforeach
</div>
<div class="container mt-5">
    <p>Table of last 5 completed payments</p>
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
          </tr>
      </thead>
      <tbody>
          @foreach($completedPayments as $data)
          <tr>
              <th scope="row">{{ $data->id }}</th>
              <td>{{ $data->Date }}</td>
              <td>{{ $data->Employee }}</td>
              <td>{{ $data->Employer }}</td>
              <td>{{ $data->Hours }}</td>
              <td>{{ $data->Rate_per_Hour }}</td>
              <td>{{ $data->Taxable }}</td>
              <td>{{ $data->Status }}</td>
              <td>{{ $data->Shift_Type }}</td>
              <td>{{ $data->Paid_At }}</td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
</body>
</html>


