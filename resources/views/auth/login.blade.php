<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            width: 100%
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
            overflow: hidden;
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
            text-decoration: none;
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
<div class="form-container">
    <h2>Login</h2>
    <form method="POST" action="{{ route('auth_login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <button type="submit">Login</button>
        </div>
    </form>
    <span id="text-create-acc"> Dont Have account ? <a href="{{ route('register')}}" id="create-acc-but">Create Account </a></span>
</div>
</body>
</html>
