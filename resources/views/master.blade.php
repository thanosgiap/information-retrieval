<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search.io</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #ffffff;">

    <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
        <div class="container justify-content-center">
            <h1 class="text-secondary" style="font-weight: 600;" >Greek Parliamentary Proceedings </h1>
        </div>
    </nav>
    <main class="p-3">
        @yield('content')
    </main>
    @yield('script')

</body>

</html>