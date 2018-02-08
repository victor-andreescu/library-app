@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>
                @if(isset($tag))
                    Edit tag
                @else
                    Add new tag
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
    
    <form action="{{isset($tag) ? route('tag.update', ['tag' => $tag->id]) : route('tag.store')}}" method="post" class="form-horizontal">
        {{ csrf_field() }}
        {{ isset($tag) ? method_field('PATCH') : ''}}

        <div class="form-group">
            <label for="tag-name" class="col-sm-2 control-label">Name:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="tag-name" name="name" value="{{isset($tag) ? $tag->name : old('name')}}" placeholder="Fiction...">
            </div>
        </div>
        <div class="form-group">
            <label for="tag-description" class="col-sm-2 control-label">Description:</label>
            <div class="col-sm-4">
                <textarea class="form-control" rows="8" id="tag-description" name="description" placeholder="Lorem ipsum...">{!!isset($tag) ? $tag->description : old('description')!!}</textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                <button class="btn btn-primary">Save</button>
                <a href="{{route('tag.index')}}" class="btn btn-defalut">Cancel</a>
            </div>
        </div>
    </form>



@endsection