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
    @yield('styles')
    
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

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="glyphicon glyphicon-menu-hamburger"></span>

                    </button>
                </div>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav">
                        @if(\Auth::user())
                        <li>
                            <a class="nav-link" href="{{route('book.index')}}">Books <span class="sr-only">(current)</span></a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{route('author.index')}}">Authors</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{route('tag.index')}}">Tags</a>
                        </li>
                        @else
                            <li>
                                <a class="nav-link" href="{{route('register')}}">Register</a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{route('login')}}">Login</a>
                            </li>
                        @endif
                    </ul>

                    @if(\Auth::user())
                    
                        <div class="navbar-text navbar-right">
                            Signed in as 
                            <a href="{{route('user.edit')}}" class="navbar-link">{{\Auth::user()->name}}</a>, 
                            <form action="{{route('logout')}}" method="post" style="display: inline-block">
                                {{csrf_field()}}
                                <button class="btn btn-xs btn-default">Logout <span class="glyphicon glyphicon-log-out"></span></button>
                            </form>
                        </div>
                    @endif
                </div>


            </div>
                


                

        </nav>

        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    {{--  <script src="{{ asset('js/app.js') }}"></script>  --}}
    @yield('scripts')
</body>
</html>
