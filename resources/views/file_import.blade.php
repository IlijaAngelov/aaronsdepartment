<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import CSV files</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 w-50 text-center">
            <h2 class="mb-4">
                Import CSV files
            </h2>
            <form action="{{ route('file_import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="import" class="form-label">Upload a CSV File:</label>
            <input type="file" id="import" name="file" class="form-control" style="height: auto">
            <div class="container">
                <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Go Back</a>
                <button class="btn btn-primary mt-3">Import CSV</button>
            </div>
            </form>
    </div>
</body>
</html>