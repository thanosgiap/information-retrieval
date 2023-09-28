@extends('master')

@section('content')
<div class="container-fluid">

    <div class="col-12 text-center mb-4 mt-4">
        <div class="d-flex justify-content-center">
            <form action="{{ route('search') }}" method="GET">
                <div class="form-group pb-4" style="width: 400px;">
                    <label for="search_in">Αναζήτηση:</label>
                    <input type="text" name="q" id="q" class="form-control" placeholder="Enter your search query" value="{{ $query ?? '' }}">
                </div>
                <div class="form-group" style="width: 400px;">
                    <label for="search_in" style="text-align: start;">Αναζήτηση βάση:</label>
                    <select name="search_in" id="search_in" class="form-control">
                        <option value="speeches" {{ $searchIn === 'party' ? 'selected' : '' }}>Πολιτικό Κόμμα </option>
                        <option value="speeches" {{ $searchIn === 'speeches' ? 'selected' : '' }}>Ομιλίας</option>
                        <option value="names" {{ $searchIn === 'names' ? 'selected' : '' }}>Ονόματος βουλευτή</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 5%; width: 400px;">Search</button>
            </form>
        </div>
    </div>
    @if ($speeches)
    <table class="table table-responsive w-100">
        <thead>
            <tr>
                <th>Όνομα</th>
                <th>Πολιτικό Κόμμα</th>
                <th>Ομιλία</th>

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
    {{ $speeches ? $speeches->appends(['search_in' => $searchIn, 'q' => $query])->links('pagination::bootstrap-5') : '' }}
    @elseif ($members)
    <table class="table table-responsive w-100">
        <thead>
            <tr>
                <th>Όνομα</th>
                <th>Πολιτικό Κόμμα</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
            <tr class="client-row position-relative mb-3">
                <td class="p-3 w-50">
                    {{ $member->name }}
                </td>

                <td class="p-3 w-50">
                    {{ $member->political_party }}
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $members ? $members->appends(['search_in' => $searchIn, 'q' => $query])->links('pagination::bootstrap-5') : '' }}
    @elseif ($party_members)
    <table class="table table-responsive w-100">
        <thead>
            <tr>
                <th>Πολιτικό Κόμμα</th>
                <th>Όνομα</th>
            </tr>
        </thead>
        <tbody>
            @foreach($party_members as $member)
            <tr class="client-row position-relative mb-3">
                <td class="p-3 w-50">
                    {{ $member->political_party }}
                </td>

                <td class="p-3 w-50">
                    {{ $member->name }}
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No results found.</p>
    @endif

</div>
@endsection