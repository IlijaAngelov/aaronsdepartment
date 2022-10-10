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
    <div class="container mt-4">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">Something went wrong...</div>
        @foreach ($errors->all() as $error)
        <ul class="list-group">
            <li class="list-group-item list-group-item-danger">{{ $error }}</li>
          </ul>
        @endforeach
        @endif
    </div>
    <div class="container mt-5">
        <form action="{{ route('shift.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <label for="employee" class="col-sm-2 col-form-label">Employee</label>
                <input type="text" class="form-control" id="employee" name="Employee" placeholder="Employee Name">
            </div>
            <div class="form-group mb-2">
                <label for="employer" class="col-sm-2 col-form-label">Employer</label>
                <input type="text" class="form-control" id="employer" name="Employer" placeholder="Employer Name">
            </div>
            <div class="form-group mb-2">
                <label for="hours" class="col-sm-2 col-form-label">Hours</label>
                <input type="number" class="form-control" id="hours" name="Hours" placeholder="Hours">
            </div>
            <div class="form-group mb-2">
                <label for="rate_per_hour" class="col-sm-2 col-form-label">Rate per Hour</label>
                <input type="number" class="form-control" id="Rate_per_hour" name="Rate_per_Hour" placeholder="Rate per Hour">
            </div>
            <div class="form-group mb-2">
                <label for="Taxable" class="col-sm-2 col-form-label">Taxable</label>
                <select id="Taxable" name="Taxable">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <select id="status" name="Status">
                    <option value="Complete">Complete</option>
                    <option value="Pending">Pending</option>
                    <option value="Processing">Processing</option>
                    <option value="Failed">Failed</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="shift_type" class="col-sm-2 col-form-label">Shift Type</label>
                <select id="shift_type" name="Shift_Type">
                    <option value="Day">Day</option>
                    <option value="Night">Night</option>
                    <option value="Holiday">Holiday</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="paid_at" class="col-sm-2 col-form-label">Paid At</label>
                <input type="datetime-local" class="form-control" id="paid_at" name="Paid_At" placeholder="Paid At">
            </div>
              <button type="submit" class="btn btn-default btn-light mb-2">New Shift</button>
        </form>
    </div>
</div>
</body>
</html>