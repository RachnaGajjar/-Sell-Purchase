@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $book->title }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Book Title</th>
                                <td>{{ $book->title }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $book->description }}</td>
                            </tr>
                            <tr>
                                <th>Author</th>
                                <td>{{ $book->author }}</td>
                            </tr>
                            <tr>
                                <th>MRP</th>
                                <td>{{ $book->mrp }}</td>
                            </tr>
                            <tr>
                                <th>ISBN 10</th>
                                <td>{{ $book->isbn10 }}</td>
                            </tr>
                            <tr>
                                <th>ISBN 13</th>
                                <td>{{ $book->isbn13 }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <h5>Offers available</h5>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Offering Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($book->userBook as $i => $ub)
                            <tr>
                                <td> {{ $i + 1 }} </td>
                                <td> 
                                    <a href="{{ route('user.details', $ub->user_id) }}">
                                        {{ $ub->user->name }}
                                    </a>
                                </td>
                                <td> {{ $ub->selling_price }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
