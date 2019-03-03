
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('book.form_title') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('books.store') }}">
                        @csrf

                        
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="title" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="auther" class="col-md-4 col-form-label text-md-right">{{ __('Auther') }}</label>

                            <div class="col-md-6">
                                <input id="auther" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="auther " value="{{ old('text') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="price" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="isdn10" class="col-md-4 col-form-label text-md-right">{{ __('Isdn 10') }}</label>

                            <div class="col-md-6">
                            <input id="isdn10" type="text" class="form-control" name="isdn10" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ifdn13" class="col-md-4 col-form-label text-md-right">{{ __('Isdn 13') }}</label>

                            <div class="col-md-6">
                                <input id="ifdn13" type="text" class="form-control" name="ifdn13" required>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}   
            
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
