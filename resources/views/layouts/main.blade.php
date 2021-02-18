<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    <title>Posts</title>
</head>
<body>

    <div class="container">

        <header class="text-uppercase text-center my-3">
            @yield('header')
        </header>

        <main class="text-capitalize my-2">
            @yield('content')
        </main>

        <footer>
            @yield('footer')
        </footer>
    </div>

</body>
</html>
