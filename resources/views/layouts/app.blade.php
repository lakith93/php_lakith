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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    {{-- Bootstrap CSS--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{--Fontawesome CDN--}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    {{--Fontawesome CDN--}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        {{--                        <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>--}}
                    </li>
                    @auth
                        <li class="p-2">
                            <form action="{{ route('route.index') }}" method="GET">
                                <button style="border:none; cursor: pointer" class="bg-light">Route</button>
                            </form>
                        </li>
                        <li class="p-2">
                            <form action="{{ route('sales-rep.index') }}" method="GET">
                                <button style="border:none; cursor: pointer" class="bg-light">Sales Representative
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
                <ul class="navbar-nav d-flex" style="list-style: none;">
                    @guest
                        <li class="p-2">
                            <form action="{{ route('register') }}" method="GET">
                                <button style="border:none; cursor: pointer" class="bg-light">Manager Registration</button>
                            </form>
                        </li>
                        <li class="p-2">
                            <form action="{{ route('login') }}" method="GET">
                                @csrf
                                <button style="border:none; cursor: pointer" class="bg-light">Login</button>
                            </form>
                        </li>
                    @endguest

                    @auth
                        <li class="p-2">
                            <form>
                                <button style="border:none; cursor: pointer"
                                        class="bg-light">{{ \Illuminate\Support\Facades\Auth::user()->name }}</button>
                            </form>
                        </li>
                        <li class="p-2">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button style="border:none; cursor: pointer" class="bg-light">Logout</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
