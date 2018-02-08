@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Books</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a class="btn btn-primary" href="{{route('book.create')}}" role="button">Add book</a>
        </div>
    </div>
    <div class="row" style="margin-top: 40px;">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 100px;">Cover</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Tags</th>
                            <th>Description</th>
                            <th style="width: 100px;">Actions</th>
                        </tr>
                    </thead>    
                    <tbody>
                        @if($books->isEmpty())
                            <tr>
                                <td colspan="6">There are no books in the database. Please <a href="{{route('book.create')}}" class="btn btn-xs btn-primary">add a book</a>.</td>
                            </tr>
                        @else
                            @foreach($books as $book)
                            <tr>
                                <td>
                                    <img src="{{$book->cover_image}}" alt="" width="80">
                                </td>
                                <td>{{$book->name}}</td>
                                <td>author</td>
                                <td>
                                    @foreach($book->tags as $tag)
                                        {{$book->tags->last() == $tag ? $tag->name : $tag->name.","}} 
                                    @endforeach
                                </td>
                                <td>{{$book->description}}</td>
                                <td>
                                    <a href="{{route('book.edit', ['author' => $book->id])}}" class="btn btn-default">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    <form action="{{route('book.delete', ['book' => $book->id])}}" method="post"  style="display: inline-block">
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