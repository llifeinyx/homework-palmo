<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>lOX</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('extra-header')
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand p-3" href="{{route('main')}}">lOX</a>
            <a role="button" class="btn btn-primary" href="{{route('search.index')}}">Search items</a>
            <div>
                @guest
                    <div>
                        <a role="button" class="btn btn-primary" href="{{route('login')}}">Login</a>
                        <a role="button" class="btn btn-primary" href="{{route('register')}}">Register</a>
                    </div>
                @else
                    <form class="form-inline my-2 my-lg-0" id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        @if(\Illuminate\Support\Facades\Auth::user()->role->name === 'admin')
                            <a role="button" class="btn btn-primary" href="{{route('admin')}}">Admin</a>
                        @endif
                        <a role="button" class="btn btn-primary" href="{{route('chats.index')}}">My chats</a>
                        <a role="button" class="btn btn-primary" href="{{route('profile')}}">My profile</a>
                        <input type="submit" class="btn btn-primary my-2 my-sm-0" value="Logout">
                    </form>
                @endguest
            </div>
        </div>
    </nav>
</header>
@if(isset($successRegistration))
    <section class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<section class="py-4">
    @yield('content')
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
