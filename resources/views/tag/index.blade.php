@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Tags</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a class="btn btn-primary" href="{{route('tag.create')}}" role="button">Add tag</a>
        </div>
    </div>
    <div class="row" style="margin-top: 40px;">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th style="width: 100px;">Actions</th>
                        </tr>
                    </thead>    
                    <tbody>
                        @if($tags->isEmpty())
                            <tr>
                                <td colspan="3">There are no tags in the database. Please <a href="{{route('author.create')}}" class="btn btn-xs btn-primary">add tag</a>.</td>
                            </tr>
                        @else
                            @foreach($tags as $tag)
                            <tr>
                                <td>{{$tag->name}}</td>
                                <td>{{$tag->description}}</td>
                                <td>
                                    <a href="{{route('tag.edit', ['author' => $tag->id])}}" class="btn btn-default">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    <form action="{{route('tag.delete', ['author' => $tag->id])}}" method="post"  style="display: inline-block">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-default">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
@endsection