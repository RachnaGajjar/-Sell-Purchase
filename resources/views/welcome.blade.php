<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MyBook</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">


        <!-- Styles -->
        
    </head>
    <body>
    
        </div>
        <div class="flex-center position-ref full-height">
            <div class="row">
        @if (Route::has('login'))
                <div class="nav top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
              <div class="content">
                <div class="title m-b-md">
                    My Books
                </div>

                <div class="links">
                    <form action="{{ route('books.search') }}">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search Book Name" name="query">
                            <div class="input-group-append">
                                <button class="search btn btn-outline-secondary" type="submit">Search</button>
                                <br>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </body>
</html>
