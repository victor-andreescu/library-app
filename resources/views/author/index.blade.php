@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Authors</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a class="btn btn-primary" href="{{route('author.create')}}" role="button">Add book</a>
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
                        @if($authors->isEmpty())
                            <tr>
                                <td colspan="3">There are no authors in the database. Please <a href="{{route('author.create')}}" class="btn btn-xs btn-primary">add an author</a>.</td>
                            </tr>
                        @else
                            @foreach($authors as $author)
                            <tr>
                                <td>{{$author->name}}</td>
                                <td>{{$author->description}}</td>
                                <td>
                                    <a href="{{route('author.edit', ['author' => $author->id])}}" class="btn btn-default">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    <form action="{{route('author.delete', ['author' => $author->id])}}" method="post"  style="display: inline-block">
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