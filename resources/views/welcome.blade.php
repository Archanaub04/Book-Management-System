<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Book Management System</title>

  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <style>

    body {
      font-family: 'Nunito', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      text-align: center;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      margin-right: 10px;
    }
     a {
        text-decoration: none;
     }
  </style>
</head>

<body class="antialiased">

  <main class="container">
    <h1>Welcome to Book Management System!</h1>
    <p>This is your one-stop shop for managing your book collection.</p>

    @if (Route::has('login'))
      @auth
        <a href="{{ route('home') }}" class="btn">Home</a>
      @else
        <a href="{{ route('login') }}" class="btn">Login</a>
        @if (Route::has('register'))
          <a href="{{ route('register') }}" class="btn">Register</a>
        @endif
      @endauth
    @endif
  </main>

</body>

</html>
