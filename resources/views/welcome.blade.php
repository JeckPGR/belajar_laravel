<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Landing Page</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .navbar {
            background-color: #FF2D20;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .navbar .nav-items {
            display: flex;
            gap: 20px;
        }

        .navbar .nav-items a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        .navbar .nav-items a:hover {
            text-decoration: underline;
        }

        .hero {
            text-align: center;
            padding: 100px 20px;
            height: 71dvh;
            background-color: #fff;
            box-shadow: 0px 14px 34px 0px rgba(0, 0, 0, 0.1);
        }

        .hero h1 {
            font-size: 48px;
            color: #333;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 20px;
            color: #555;
            margin-bottom: 40px;
        }

        .hero .cta {
            display: inline-block;
            background-color: #FF2D20;
            color: white;
            padding: 15px 30px;
            border-radius: 5px;
            font-size: 18px;
            text-decoration: none;
        }

        .hero .cta:hover {
            background-color: #e0241b;
        }

    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="logo">
        My Laravel App
    </div>
    <div class="nav-items">
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Create Account</a>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <h1>Welcome to My Laravel App</h1>
    <p>This is a simple landing page created with HTML and CSS.</p>
    <a href="#" class="cta">Get Started</a>
</section>

</body>
</html>
