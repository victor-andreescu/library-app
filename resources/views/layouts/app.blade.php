<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Library App
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav navbar-nav">
                        <li>
                            <a class="nav-link" href="{{route('book.index')}}">Books <span class="sr-only">(current)</span></a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{route('author.index')}}">Authors</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{route('tag.index')}}">Tags</a>
                        </li>
                    </ul>
                </div>

            </div>
                


                

        </nav>

        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    {{--  <script src="{{ asset('js/app.js') }}"></script>  --}}
    @yield('scripts')
</body>
</html>
