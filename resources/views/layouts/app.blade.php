<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body id="body">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-laravel">
            <div class="navigation container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <form action="{{ route('books.search') }}" class="navsearch">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search Book Name" name="query">
                                <div class="input-group-append">
                                    <button class="search btn btn-outline-secondary" type="submit">Search</button>
                                
                                </div>
                            </div>
                        </form>

                
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="{{ route('user.profile') }}">
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('books.create') }}">
                                        Add Book
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>



    <!-- Footer -->
    <footer class="footer page-footer font-small pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-1 mb-md-0 mb-3"></div>
        <div class="col-md-6 mt-md-0 mt-3">

          <!-- Content -->
          <h5 class="text-uppercase">Bookish</h5>
          <p>Developed as project for final year of Diploma</p>
            <h4>Government Polytechnic, Bhuj</h3>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-200 d-md-none pb-3">


 
          <!-- Grid column -->
            <div class="col-md-2 mb-md-0 mb-3">
            </div>
          <!-- Grid column -->
          <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="text-uppercase">Contact Us</h5>

            <div class="row">
                <div class="col-md-3">
                    Mail:
                </div>
                <div class="col-md-9">
             <a href="mailto:bookish@mail.com">bookish@mail.com</a>
             </div>
         </div>

             <div class="row">
                <div class="col-md-3">
                    Gmail:
                </div>
                <div class="col-md-9">
             <a href="mailto:bookish@mail.com"><i class="fa fa-google">emailbookish@gmail.com</a>
             </div>
             </div>

            <div class="row">
                <div class="col-md-3">
                    Outlook:
                </div>
                <div class="col-md-9">
             <i class="fa fa-microsoft"></i><a href="mailto:bookish@mail.com">book.ish@outlook.com</a>
         </div>
         </div>
          </div>
          <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© Jvency Malani<br>Rachna Gajjar<br>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
</body>
</html>
