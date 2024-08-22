<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap">
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 14px 34px 0px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .form-group input {
            width: 94%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #FF2D20;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #e0241b;
        }

        #create-acc-but{
            color: red;
            text-decoration: none
        }

        #create-acc-but:hover{
            text-decoration: underline;
        }

        #text-create-acc{
            text-align: center;
            display: block; /* Pastikan display-nya block atau inline-block */
            width: 100%; /* Menyesuaikan lebar dengan induk */
        }

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

        .alert-error {
            background-color: #ecb0ad;
            color: #641f16;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #c3e6cb;
            position: fixed;
            top: 15px;
            right: 7%;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Create Account</h2>

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
     @endif

    @if (session('error'))
        <div class="alert-error" >
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
    <div class="alert-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        
    <form method="POST" action="{{ route('register_akun') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group"> 
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <button type="submit">Create Account</button>
        </div>
    </form>
    <span id="text-create-acc"> Already Have an Account ? <a href="{{ route('login')}}" id="create-acc-but">Log In </a></span>
</div>
</body>
</html>
