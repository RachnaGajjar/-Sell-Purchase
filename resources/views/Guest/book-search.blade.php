@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Search results
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('books.search') }}">

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search Book Name" name="query" value="{{ $q }}">
                            <div class="input-group-append">
                                <button class="search btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>


                    @foreach ( $list as $book )
                    <div>
                        <a href="{{ route('books.details', $book->id) }}">
                            {{ $book->title }}
                        </a>
                        <span class="float-right"> &#x20B9; {{ $book->selling_price }} [ <strike>MRP &#x20B9; {{ $book->mrp }}</strike> ] </span>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
