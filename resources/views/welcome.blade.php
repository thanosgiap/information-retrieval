@extends('master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h4 class="text-primary">A fast and responsive search engine for parliament <br> proceedings that took place from 1989 till 2020</h4>
            </div>
            <div class="col-12 text-center pt-4 pb-5">
                <h4 class="text-primary">Search a member, political party or just a speech word/phrase <br> and all relevant results will show up</h4>
            </div>


            <div class="col-12 text-center" style="padding-top: 5%;">
                <div class="d-flex justify-content-center">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="form-group pb-4" style="width: 400px;">
                            <label for="search_in">Αναζήτηση:</label>
                            <input type="text" name="q" id="q" class="form-control" placeholder="Enter your search query" value="{{ $query ?? '' }}">
                        </div>
                        <div class="form-group" style="width: 400px;">
                            <label for="search_in" style="text-align: start;">Αναζήτηση βάση:</label>
                            <select name="search_in" id="search_in" class="form-control">
                                <option value="party" {{ $searchIn === 'party' ? 'selected' : '' }}>Πολιτικό Κόμμα </option>
                                <option value="speeches" {{ $searchIn === 'speeches' ? 'selected' : '' }}>Ομιλίας</option>
                                <option value="names" {{ $searchIn === 'names' ? 'selected' : '' }}>Ονόματος βουλευτή</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 5%; width: 400px;">Search</button>
                    </form>
                </div>
            </div>



        </div>
    </div>

</section>



@endsection