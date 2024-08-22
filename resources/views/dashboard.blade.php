<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
            z-index: 1000;
        }

        .logout-button {
            background-color: #FF2D20;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }

        .logout-button:hover {
            background-color: #e0241b;
        }

        .add-book-button {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .add-book-button:hover {
            background-color: #218838;
        }

        #under{
            text-decoration: none
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Hello, {{ $name }}</h1>
            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>

       <div class="d-flex justify-content-between align-items-center">
        <h2>Your Book Data</h2>
        <!-- Add Book Button -->
        <a class="add-book-button" href="{{ route('addbook') }}"  id="under" >Add Book</a>
       </div>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Loaned</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through books here -->
                @foreach($books as $book)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $book->bookname }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>{{ $book->loaned }}</td>
                    <td>
                        <button  data-bs-toggle="modal" data-bs-target="#updateModal"  class="btn btn-warning btn-sm" >
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button  data-bs-toggle="modal" data-bs-target="#readModal"  class="btn btn-info btn-sm" >
                         <i class="bi bi-info-circle"></i>
                        </button>
                     
              
                        <form method="POST" action="{{ route('delete_book', $book->id) }}" class="btn btn-danger py-1 px-2 " onclick="return confirm('Are you sure you want to delete this book?');">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bi bi-trash btn btn-danger p-0 "></i>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

                <!-- Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <h2>Update your book details here</h2>
                    <form action="{{ route('edit_book', $book->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="bookname"  class="form-label">Book Name</label>
                            <input type="text" name="bookname" id="bookname" value="{{ $book->bookname}}" class="form-control">
                        </div>
                        <div>
                            <label for="genre"  class="form-label">Book Genre</label>
                            <input type="text" name="genre" id="genre" value="{{ $book->genre}}" class="form-control">
                        </div>
                        <div>
                            <label for="author"  class="form-label">Author</label>
                            <input type="text" name="author" id="author" value="{{ $book->author}}" class="form-control">
                        </div>
                        <div>
                            <label for="loaned"  class="form-label">Loaned</label>
                            <input type="number" name="loaned" id="loaned" value="{{ $book->loaned}}" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                    </form>
                </div>
                
            </div>
            </div>
        </div>

        <div class="modal fade" id="readModal" tabindex="-1" aria-labelledby="readModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Book Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <h2>Read your book details here</h2>
                        <div>
                            <label for="bookname"  class="form-label">Book Name</label>
                            <input type="text" name="bookname" id="bookname" value="{{ $book->bookname}}" class="form-control">
                        </div>
                        <div>
                            <label for="genre"  class="form-label">Book Genre</label>
                            <input type="text" name="genre" id="genre" value="{{ $book->genre}}" class="form-control">
                        </div>
                        <div>
                            <label for="author"  class="form-label">Author</label>
                            <input type="text" name="author" id="author" value="{{ $book->author}}" class="form-control">
                        </div>
                        <div>
                            <label for="loaned"  class="form-label">Loaned</label>
                            <input type="number" name="loaned" id="loaned" value="{{ $book->loaned}}" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</body>
</html>
