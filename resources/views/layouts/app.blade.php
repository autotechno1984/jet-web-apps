<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Shanghai-Cobra</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="https://kit.fontawesome.com/942785f6e0.js" crossorigin="anonymous"></script>
    <!-- Styles Bootstrap 4.6-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--    Bootstrap 5.1   --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @media (max-width: 560px) {
            .col-amount {
                width: 50%;
            }

            .cols-macau {

                width: 100%;
            }

        }
    </style>
</head>
<body style="background: #a0aec0;">
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm navbar-dark" style="background: #2c3034 !important; color:#fff !important;  ">
            <div class="container">
                <a href="#"></a>
                <a class="navbar-brand" href="#">
                    Shanghai - Cobra
                </a>
                <button class="navbar-toggler" style="border: 1px solid white;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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

                            <li class="nav-item dropdown">

                                <a id="togelDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Togel
                                </a>

                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="togelDropdown">
                                    @foreach($markets as $market)

                                        <a href="{{route( 'togel', [$market->id] ) }}" class="dropdown-item">{{ $market->pasaran }}</a>

                                    @endforeach
{{--                                    <a href="{{ route('togel') }}" class="dropdown-item">GRAND-SHANGHAI</a>--}}
                                </div>
                            </li>
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('transaksi') }}" class="dropdown-item">Transaksi</a>
                                    @if(isset(Auth::user()->profile->kredit))
                                    <a href="#" class="dropdown-item" style="background: #0b7ec4; color:yellow;" readonly>Kredit : {{ number_format(Auth::user()->profile->kredit) }}</a>
                                    @else
                                        <a href="#" class="dropdown-item" style="background: #0b7ec4; color:yellow;" readonly>Kredit : 0</a>
                                    @endif
                                    <a href="{{ route('statement') }}" class="dropdown-item">Statement</a>
                                    <a href="{{ route('gantipassword') }}" class="dropdown-item">Ganti Password</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a href="#" class="dropdown-item"></a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>



            @yield('content')
            @yield('togel')
            @yield('transaksi')
            @yield('statement')
            @yield('gantipassword')
            @yield('invoicedetail')
            @yield('statementdetail')

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <script src="{{ asset('js/script.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function(){
            $(".alert").delay(3000).slideUp(500);
                    });


    </script>

    <script type="text/javascript">
        $("#password").password('toggle');
    </script>



</body>
</html>
