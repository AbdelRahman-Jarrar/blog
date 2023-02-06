<?php
use App\Http\Controllers\ProductController;
$total=ProductController::getcart();

?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>







    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{ asset('js/app.js') }}" >
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap-icons-1.9.1/font/bootstrap-icons.woff2') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}" id="bootstrap-css">
</head>
<body>
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/listings') }}"> --}}
                    {{-- @if (Auth::user()->role == 'admin')

                    Admin panel                 </a>
                    @endif --}}

                    <a class="navbar-brand" href="{{ url('/listings') }}">
                        {{-- @if (Auth::user()->role == 'merchant')

                        merchant panel                 </a>
                        @endif --}}

                        <a class="navbar-brand" href="{{ url('/listings') }}">
                            {{-- @if (Auth::user()->role == 'customer')

                            customer panel                 </a>
                            @endif --}}
                            {{-- <li class="navbar navbar-light bg-light" style="background-color: white">
                                <div class="container-fluid" style="background-color: white">
                                  <form class="d-flex" >
                                    <input style="background-color: white" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button style="background-color: white" class="btn btn-outline-success" type="submit">Search</button>
                                  </form>
                                </div> --}}
                            </li>
                    {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul> --}}

                    <!-- Right Side Of Navbar -->
                    {{-- <ul class="navbar-nav ms-auto">
                            @guest

                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>

                                @endif
                            @else

                            <img  src="{{Auth::user()->profilepic}}" alt="direction"
                            class="rounded-circle img-fluid " style="width: 40px; height:50px; ">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('profile') }}"> profile
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
        <a href="/checkout" style="color:black" class="form-inline my-2 my-lg-0">  <span  class="material-symbols-outlined form-inline my-2 my-lg-0 " href="/checkout" > shopping_cart </span><a class="form-inline my-2 my-lg-0" style="width: 20px">{{ $total }}</a></a>

                            @endguest
                        </ul>



                    </ul>
                </div>
            </div>
        </nav>
 --}}
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/listings') }}">Hyper-Shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">About us</a>
          </li>
        </ul>
        <form class="d-flex" style="  margin: 25px;">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-secondary" type="submit" style="">Search</button>
        </form>
      </div>
      <ul class="navbar-nav ms-auto nav-item">
        @guest

            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>

            @endif
        @else
        <p></p>
        <img  src="{{Auth::user()->profilepic}}" alt="direction"
        class="rounded-circle img-fluid " style="width: 30px; height:35px; margin-lift; ">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('profile') }}"> profile
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
<a href="/checkout" style="color:black" class="form-inline my-2 my-lg-0">  <span  class="material-symbols-outlined form-inline my-2 my-lg-0 " href="/checkout" > shopping_cart </span><a class="form-inline my-2 my-lg-0" style="width: 20px">{{ $total }}</a></a>

        @endguest
    </ul>
    </div>
  </nav>
        @auth
        @if (Auth::user()->role == 'customer')

        @else{

          <nav class="main-menu" style="position: fixed">
            <ul>
                <li>
                    <a href="{{ url('/listings') }}">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>

                </li>
                @if (Auth::user()->role == 'admin')
                <li class="has-subnav">
                    <a href="{{ route('users.index') }}">
                        <i class="fa fa-laptop fa-2x"></i>
                        <span class="nav-text">Manage Users</span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="{{ route('order') }}">
                        <i class="fa fa-laptop fa-2x"></i>
                        <span class="nav-text">Manage orders</span>
                    </a>

                </li>


                <li class="has-subnav">
                    <a href="{{ route('categories.index') }}">
                       <i class="fa fa-tasks fa-2x"></i>
                        <span class="nav-text">
                            Manage category
                        </span>
                    </a>

                </li>


                  <li class="has-subnav">
                    <a href="{{ route('products.index') }}">
                       <i class="fa fa-folder-open fa-2x"></i>
                        <span class="nav-text">
                            Manage Products
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="/listings">
                       <i class="fa fa-folder-open fa-2x"></i>
                        <span class="nav-text">
                            Manage listings
                        </span>
                    </a>

                </li>
                @endif
                @if (Auth::user()->role == 'merchant'  ??  Auth::user()->role == 'admin' )

                <li class="has-subnav">
                    <a href="{{ route('merchant.index') }}">
                        <i class="fa fa-laptop fa-2x"></i>
                        <span class="nav-text">Manage Merchant</span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="{{ route('order') }}">
                        <i class="fa fa-laptop fa-2x"></i>
                        <span class="nav-text">Manage orders</span>
                    </a>

                </li>

                <li class="has-subnav">
                    <a href="{{ route('MerchantProduct.index') }}">
                        <i class="fa fa-laptop fa-2x"></i>
                        <span class="nav-text">Manage Product</span>
                    </a>

                </li>
                @endif

                {{-- <li class="has-subnav">
                    <a href="{{ route('roles.index') }}">
                       <i class="fa fa-user-circle fa-2x"></i>
                        <span class="nav-text">
                            Manage Users Roles
                        </span>
                    </a>

                </li> --}}


            </ul>

            <ul class="logout">
                <li>
                   <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                         {{ __('Logout') }}
                        </span>
                    </a>

                </li>
            </ul>
        </nav>
    }
    @endif
        @endauth


    <main class="py-4">
        <div class="container">
        @yield('content')
        </div>
    </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/checkout.js') }}" ></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script  src=" {{ asset('js/script.js') }}"></script>
    <script  src=" {{ asset('js/qty.js') }}"></script>
    <script src="{{asset ('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
    integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>

    @yield('scripts')

</body>
</html>

