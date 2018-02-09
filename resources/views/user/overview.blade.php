@extends('user.edit')

@section('right-panel')
<div class="panel-heading">
    <h1 class="panel-title">Overview</h1>
</div>
<div class="panel-body">
    <form action="{{route('user.update')}}" method="post"  class="form-horizontal">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="user-name" class="col-sm-4 control-label">Name:</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="user-name" name="name" value="{{$user->name}}">
            </div>
            {{--  <div class="col-sm-1">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="line-height: 36px;font-size: 20px;"></span>
            </div>  --}}
        </div>
        <div class="form-group">
            <label for="user-email" class="col-sm-4 control-label">Email:</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="user-email" name="email" value="{{$user->email}}">
            </div>
            {{--  <div class="col-sm-1">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="line-height: 36px;font-size: 20px;"></span>
            </div>  --}}
        </div>

        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <button class="btn btn-primary">Save changes</button>
            </div>
        </div>

    </form>
</div>
@endsection