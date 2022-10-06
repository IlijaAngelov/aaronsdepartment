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
        <h1>Edit Page</h1>
        <form action="{{ route('shift.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group mb-2">
                <label for="employee" class="col-sm-2 col-form-label">Employee</label>
                <input type="text" class="form-control" id="employee" name="Employee" value="{{ $user->Employee }}">
            </div>
            <div class="form-group mb-2">
                <label for="employer" class="col-sm-2 col-form-label">Employer</label>
                <input type="text" class="form-control" id="employer" name="Employer" value="{{ $user->Employer }}">
            </div>
            <div class="form-group mb-2">
                <label for="hours" class="col-sm-2 col-form-label">Hours</label>
                <input type="number" class="form-control" id="hours" name="Hours" value="{{ $user->Hours }}">
            </div>
            <div class="form-group mb-2">
                <label for="rate_per_hour" class="col-sm-2 col-form-label">Rate per Hour</label>
                <input type="number" class="form-control" id="rate_per_hour" name="Rate_per_Hour" placeholder="{{ ltrim($user->Rate_per_Hour, '£') }}" value="{{ $user->Rate_per_Hour }}">
            </div>
            <div class="form-group mb-2">
                <label for="taxable" class="col-sm-2 col-form-label">Taxable</label>
                <select id="taxable" name="Taxable">
                    <option value="">Select...</option>
                    <option value="Yes" {{ $user->Taxable == "Yes" ? 'selected' : '' }}>Yes</option>
                    <option value="No" {{ $user->Taxable == "No" ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <select id="status" name="Status">
                    <option value="">Select...</option>
                    <option value="Complete" {{ $user->Status == "Complete" ? 'selected' : '' }}>Complete</option>
                    <option value="Pending" {{ $user->Status == "Pending" ? 'selected' : '' }}>Pending</option>
                    <option value="Processing" {{ $user->Status == "Processing" ? 'selected' : '' }}>Processing</option>
                    <option value="Failed" {{ $user->Status == "Failed" ? 'selected' : '' }}>Failed</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="shift_type" class="col-sm-2 col-form-label">Shift Type</label>
                <select id="shift_type" name="Shift_Type">
                    <option value="">Select...</option>
                    <option value="Day" {{ $user->Shift_Type == "Day" ? 'selected' : '' }}>Day</option>
                    <option value="Night" {{ $user->Shift_Type == "Night" ? 'selected' : '' }}>Night</option>
                    <option value="Holiday" {{ $user->Shift_Type == "Holiday" ? 'selected' : '' }}> Holiday</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="paid_at" class="col-sm-2 col-form-label">Paid At</label>
                <input type="date" class="form-control" id="paid_at" name="Paid_At" value="{{  $user->Paid_At }}">
            </div>
              <button type="submit" class="btn btn-default btn-light mb-2">Edit Shift</button>
        </form>
    </div>
</div>
</body>
</html>