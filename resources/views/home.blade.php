@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm float-right"> Add new book to sell </a>
                    Book Listing
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($list)) 

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Title </th>
                                    <th> Selling Price / MRP </th>
                                    <th> Verified </th>
                                    <th> Sold ? </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $i => $ubook)
                                <tr>
                                    <td> {{ $i + 1 }} </td>
                                    <td> {{ $ubook->book->title }} </td>
                                    <td> {{ $ubook->selling_price }} ( <strike> {{ $ubook->book->mrp }} </strike>) </td>
                                    <td> {{ $ubook->book->verified }} </td>
                                    <td>
                                        @if($ubook->sold)
                                            Already Sold
                                        @else
                                        <form action="{{ route('books.sold', $ubook->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-default">
                                                Sold
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('books.destroy', $ubook->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger"> Delete </button>
                                            
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    @else

                        No books yet to show.

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
