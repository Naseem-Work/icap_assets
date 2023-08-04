<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Asset Management System</title>
    <!-- Include your CSS stylesheets or CDN links here -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f7f7f7;
        }

        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-nav li a {
            font-size: 1rem;
        }

        .container {
            max-width: 960px;
        }

        .mt-4 {
            margin-top: 4rem;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="fas fa-cogs"></i> Asset Management System
        </a>

        @auth
            <div class="d-flex justify-content-between align-items-center mb-3">
                <!-- Welcome text -->

                <span class="text-muted">Welcome, <b>{{ auth()->user()->name }}</b></span>

                <!-- Space -->
                <span class="mx-3"></span>

                <!-- Logout button -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        @endauth

    </div>
</nav>


<div class="container mt-4">
    @yield('content')
</div>

<!-- Include your JavaScript files or CDN links here -->
<script src="{{ mix('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
