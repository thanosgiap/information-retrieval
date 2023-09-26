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
<nav class="navbar navbar-expand-lg navbar-light bg-light  p-2">
            <form action="{{ route('search.results') }}" method="GET" id="searchForm" class="gap-2 d-flex align-items-center justify-content-center">
                <input type="text" class="form-control" name="query" id="searchInput" placeholder="{{ $query }}" >
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
    </nav>

    <div class="container-fluid mt-4">
    @yield('content')
</div>

    <!-- Include Bootstrap JS (optional, only if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
    </body>
</html>
<style>
.pagination .page-item.disabled .page-link {
    background-color: grey; /* Grey color for disabled buttons */
}

.pagination .page-item:not(.disabled) .page-link {
    background-color: blue; /* Blue color for active buttons */
}</style>