@extends('master')

@section('content')
<div class="container-fluid">

    <div class="col-12 text-center mb-4 mt-4">
        <div class="d-flex justify-content-center">
            <form action="{{ route('search') }}" method="GET">
                <div class="form-group" style="width: 400px;">
                    <input type="text" name="q" id="q" class="form-control" placeholder="Enter your search query" value="{{ $query ?? '' }}">
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 5%; width: 400px;">Search</button>
            </form>
        </div>
    </div>
    @if ($speeches->isEmpty() == false)
    <table class="table table-responsive w-100">
        <thead>
            <tr>
                <th>Member Name</th>
                <th>Political Party</th>
                <th>Speech</th>

            </tr>
        </thead>
        <tbody>
            @foreach($speeches as $speech)
            <tr class="client-row position-relative mb-3">
                <td class="p-3 w-25">
                    {{ $speech->member->name }}
                </td>

                <td class="p-3 w-25">
                    {{ $speech->member->political_party }}
                </td>

                <td class="p-3 w-30">
                    {{ \Illuminate\Support\Str::limit($speech->speech_content, 150, $end='...') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $speeches->links('pagination::bootstrap-5') }}
    @else
    <p>No results found.</p>
    @endif
    
</div>
@endsection