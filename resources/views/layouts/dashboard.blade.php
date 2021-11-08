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
</head>
<body class="my-main-bg h-100">
    <nav style="height: 50px" class="my-navbar navbar navbar-expand-md navbar-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0 h-100" href="{{ route('admin.index') }}"></a>
        <ul class="navbar-nav px-3 ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}">
                    Visita il sito
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <div class="container-fluid h-100">
        <div class="row gx-4 h-100">
            <nav class="my-sidebar h-100 col-md-2 d-none d-md-block bg-light sidebar py-4">
                <div class="sidebar-sticky h-100">
                    <ul class="nav flex-column h-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.posts.index') }}">
                                <i class="fas fa-house-user"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.posts.index') }}" >
                                <i class="fas fa-list-alt" ></i>
                                Posts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.posts.create') }}">
                                <i class="fas fa-plus"></i>
                                New Posts
                            </a>
                        </li>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="fas fa-users-cog"></i>
                                Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.categories.index') }}" >
                                <i class="fas fa-layer-group"></i>
                                Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-tags"></i>
                                Tags
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>

            <main role="main" class="my-main-bg h-100 col-md-9 ml-sm-auto col-lg-10 px-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>