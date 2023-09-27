@extends('master')

@section('content')

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h4 class="text-primary">A fast and responsive search engine for parliament <br> proceedings that took place from 1989 till 2020</h4>
            </div>
            <div class="col-12 text-center pt-4 pb-5">
                <h4 class="text-primary">Search a member, political party, parliamentary period or just a word <br> and all relevant results will show up</h4>
            </div>


            <div class="col-12 text-center" style="padding-top: 5%;">
                <div class="d-flex justify-content-center">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="form-group" style="width: 400px;">
                            <input type="text" name="q" id="q" class="form-control" placeholder="Enter your search query" value="{{ old('q') }}">
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 5%; width: 400px;">Search</button>
                    </form>
                </div>
            </div>



        </div>
    </div>

</section>



@endsection