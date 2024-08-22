<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store Your Book</title>
    <style>
          .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #c3e6cb;
            position: fixed;
            top: 15px;
            right: 7%;
        }
    </style>
    <!-- Add some basic styling (Bootstrap CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
     @endif
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Store Your Book Here</h1>
                <form method="POST" action="{{ route('store_book') }}">
                    
                    @csrf
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <input type="text" class="form-control" id="genre" name="genre" required>
                    </div>
                    <div class="mb-3">
                        <label for="bookname" class="form-label">Book Name</label>
                        <input type="text" class="form-control" id="bookname" name="bookname" required>
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" class="form-control" id="author" name="author" required>
                    </div>
                    <div class="mb-3">
                        <label for="loaned" class="form-label">Loaned </label>
                        <input type="number" class="form-control" id="loaned" name="loaned" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

  
</body>
</html>
