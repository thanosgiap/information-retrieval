@php
    $query = request('query'); // Retrieve the query parameter from the URL
@endphp
@extends('search-bar')

@section('content')
    
    <h1>Search Results for "{{ $query }}"</h1>
    
    @if(count($articles) > 0)
        @foreach($articles as $article)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $article['title'] }}</h5>
                    <p class="card-text">{{ $article['content'] }}</p>
                </div>
            </div>
        @endforeach

        <!--   Pagination links -->
    @else
        <p>No results found.</p>
    @endif

    @if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
        @else
            <li class="page-item">
                <a href="{{ $paginator->previousPageUrl() }}" class="page-link">Previous</a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" class="page-link">Next</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">Next</span>
            </li>
        @endif
    </ul>
@endif

@endsection

