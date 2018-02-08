@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>
                @if(isset($author))
                    Edit author
                @else
                    Add new author
                @endif
            </h1>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{isset($author) ? route('author.update', ['author' => $author->id]) : route('author.store')}}" method="post" class="form-horizontal">
        {{ csrf_field() }}
        {{ isset($author) ? method_field('PATCH') : ''}}

        <div class="form-group">
            <label for="author-name" class="col-sm-2 control-label">Name:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="author-name" name="name" value="{{isset($author) ? $author->name : old('name')}}" placeholder="John Doe">
            </div>
        </div>
        <div class="form-group">
            <label for="author-description" class="col-sm-2 control-label">Description:</label>
            <div class="col-sm-4">
                <textarea class="form-control" rows="8" id="author-description" name="description" placeholder="Lorem ipsum...">{!!isset($author) ? $author->description : old('description')!!}</textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                <button class="btn btn-primary">Save</button>
                <a href="{{route('author.index')}}" class="btn btn-defalut">Cancel</a>
            </div>
        </div>
    </form>



@endsection