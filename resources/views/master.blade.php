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

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="text-center">
            <form action="{{ route('search.results') }}" method="GET" id="searchForm">
                <input type="text" class="form-control" name="query" id="searchInput" placeholder="Search...">
                <button type="submit" class="btn btn-primary mt-3">Search</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
    
</body>

</html>