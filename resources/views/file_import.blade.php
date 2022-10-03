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
    <div class="container mt-5 text-center">
        <h2 class="mb-4">
            Importing CSV files
        </h2>
        <form action="{{ route('file_import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text-left">
                <input type="file" name="file" id="customFile">
                <label for="customFile">Choose file</label>
            </div>
            <button class="btn btn-primary">Import CSV</button>
        </form>
    </div>
</body>
</html>