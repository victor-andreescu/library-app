@extends('user.edit')

@section('right-panel')
<div class="panel-heading">
    <h1 class="panel-title">Overview</h1>
</div>
<div class="panel-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('user.password.update')}}" method="post"  class="form-horizontal">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="old-pass" class="col-sm-4 control-label">Old Password:</label>
            <div class="col-sm-7">
                <input type="password" class="form-control" id="old-pass" name="old_password">
            </div>
            
        </div>

        <div class="form-group">
            <label for="new-pass" class="col-sm-4 control-label">New Password:</label>
            <div class="col-sm-7">
                <input type="password" class="form-control" id="new-pass" name="password">
            </div>
            
        </div>

        <div class="form-group">
            <label for="confirm-pass" class="col-sm-4 control-label">Confirm New:</label>
            <div class="col-sm-7">
                <input type="password" class="form-control" id="confirm-pass" name="password_confirmation">
            </div>
            
        </div>

        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <button class="btn btn-primary">Save changes</button>
            </div>
        </div>

    </form>
</div>
@endsection