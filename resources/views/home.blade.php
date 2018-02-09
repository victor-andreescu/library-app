@extends('layouts.app')

@section('content')
    <h1>Welcome to Library App</h1>
    <div class="row">
        <div class="col-md-6">
            @if(\Auth::user())
                <p>
                    Checkout our:
                </p>
                <p>
                    <a href="{{route('book.index')}}" class="btn btn-primary">Books</a>
                    <a href="{{route('author.index')}}" class="btn btn-primary">Authors</a> 
                    <a href="{{route('tag.index')}}" class="btn btn-primary">Tags</a>
                </p>
            @else
                <p>To access our app you need to:</p>
                <p>
                    <a href="{{route('register')}}" class="btn btn-primary">Register</a>
                    or
                    <a href="{{route('login')}}" class="btn btn-primary">Login</a>
                </p>
            
            @endif

            <hr>
            <p>Exista doua categorii de useri:</p>
            <ul>
                <li>Administratori -> pot adauga Carti, Tag-uri, Autori</li>
                <li>Useri -> pot vedea listele cu Carti, Tag-uri, Autori si pot rezerva Carti</li>
            </ul>
            <p>Utilizatorii se pot inregistra singuri, Administratorii sunt predefiniti.</p>

            <div class="panel panel-default">
                <div class="panel-heading">Administrator:</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-2">
                            <p><strong>Email:</strong></p>
                        </div>
                        <div class="col-xs-2">
                            <p>victor.andreescu@gmail.com</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-2">
                            <p><strong>Parola:</strong></p>
                        </div>
                        <div class="col-xs-2">
                            <p>secret</p>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
        </div>
    </div>
@endsection