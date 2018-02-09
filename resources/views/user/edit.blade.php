@extends('layouts.app')

@section('content')
    <div class="row" style="margin-top: 40px;">
        <div class="col-sm-4 " >
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">My account</h1>
                </div>
                <div class="panel-body">
                    <a href="{{route('user.edit')}}" class="btn">
                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 
                        Overview
                    </a>
                    <br>
                    <a href="{{route('user.password')}}" class="btn">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        Change Password
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-offset-0 col-sm-8 col-md-offset-2 col-md-6">
            <div class="panel panel-default">
                    @yield('right-panel')
            </div>
        </div>
    </div>
@endsection