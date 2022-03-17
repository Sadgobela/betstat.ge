<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>--}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" defer></script>


</head>
<body>
    <div id="app">
        @auth
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/admin/home') }}">
                   Admin
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
{{--                        @auth--}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sport.index') }}">Sport</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('news.index') }}">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('casino.index') }}">Casino</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('promo.index') }}">Promo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('poker.index') }}">Poker</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                P2P
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('p2p.index', ['cat=bura']) }}">Bura</a>
                                <a class="dropdown-item" href="{{ route('p2p.index', ['cat=backgammon']) }}">Backgammon</a>
                                <a class="dropdown-item" href="{{ route('p2p.index', ['cat=domino']) }}">Domino</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('slider.index') }}">Slider</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('banners.index') }}">Banners</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('leagues.index') }}">Leagues</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Poll
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('poll-questions.index') }}">Poll Questions</a>
                                <a class="dropdown-item" href="{{ route('poll-answers.index') }}">Poll Answers</a>
{{--                                <a class="dropdown-item" href="{{ route('p2p.index', ['cat=backgammon']) }}">Backgammon</a>--}}
{{--                                <a class="dropdown-item" href="{{ route('p2p.index', ['cat=domino']) }}">Domino</a>--}}
                            </div>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('poll-questions.index') }}">poll</a>--}}
{{--                        </li>--}}
{{--                        @endauth--}}
                    </ul>

{{--                    asssssssss--}}
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="logout"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="logout" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
        @endauth
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @yield('js')

</body>

</html>
