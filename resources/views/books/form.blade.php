@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('home') }}" class="btn btn-primary btn-sm float-right"> 
                        Back
                    </a>
                    Book Form

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(@$isbn) 
                   <form action="{{ route('books.store') }}" method="POST">

                            @csrf

                            @if(@$book) 
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                            @endif

                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control {{@$errors->has('title')?'is-invalid':''}}" type="text" value="{{ old('title', @$book->title)}}" name="title"></input>

                                @if(@$errors->has('title'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif

                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control {{@$errors->has('description')?'is-invalid':''}}">{{ old('description', @$book->description)}}</textarea>
                                @if(@$errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md">

                                    <div class="form-group">
                                        <label>Author</label>
                                        <input class="form-control {{@$errors->has('author')?'is-invalid':''}}" type="text" value="{{ old('author', @$book->author)}}" name="author"></input>

                                        @if(@$errors->has('author'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('author') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>MRP</label>
                                        <input class="form-control {{@$errors->has('mrp')?'is-invalid':''}}" type="text" value="{{ old('mrp', @$book->mrp)}}" name="mrp"></input>

                                        @if(@$errors->has('mrp'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('mrp') }}
                                            </div>
                                        @endif
                                    </div>
                                    
                                </div>
                                <div class="col-md">

                                    <div class="form-group">
                                        <label>ISBN 10</label>
                                        <input class="form-control {{@$errors->has('isbn10')?'is-invalid':''}}" type="text" value="{{ old('isbn10', @$book->isbn10?@$book->isbn10:$isbn10)}}" name="isbn10"></input>

                                        @if(@$errors->has('isbn10'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('isbn10') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>ISBN 13</label>
                                        <input class="form-control {{@$errors->has('isbn13')?'is-invalid':''}}" type="text" value="{{ old('isbn13', @$book->isbn13?@$book->isbn13:$isbn13)}}" name="isbn13"></input>
                                        @if(@$errors->has('isbn13'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('isbn13') }}
                                            </div>
                                        @endif
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Your selling price</label>
                                        <input class="form-control {{@$errors->has('selling_price')?'is-invalid':''}}" type="text" value="{{ old('selling_price', @$book->selling_price)}}" name="selling_price"></input>
                                        @if(@$errors->has('selling_price'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('selling_price') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <button type="submit" class="btn btn-success">
                                    Save
                                </button>
                            </div>

                        </form>

                    @else

                        <form>
                            <div class="form-group">
                                <label>Enter ISBN:</label>
                                <input type="text" name="isbn" class="form-control">
                            </div>                        
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"> Check Book Available ?</button>
                            </div>
                        </form>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
