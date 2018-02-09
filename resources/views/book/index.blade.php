@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Books</h1>
        </div>
    </div>
    @can('edit', \App\Book::class)
        <div class="row">
            <div class="col-12">
                <a class="btn btn-primary" href="{{route('book.create')}}" role="button">Add book</a>
            </div>
        </div>
    @endcan
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                            <th style="width: 150px;">Actions</th>
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
                                    @can('edit', \App\Book::class)
                                    
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
                                    @endcan
                                    @if(!$myRents->contains($book))
                                    <a
                                        tabindex="0"
                                        class="btn btn-success jsRent"
                                        role="button"
                                        data-popover-title="Rent a book"
                                        data-book-id="{{$book->id}}"
                                    >
                                        <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                                    </a>
                                    @else
                                    <a href="" class="btn btn-default disabled">
                                        <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                                        Rented
                                    </a>
                                    @endif
                                    
                                    
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

@section('scripts')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $('.jsRent').popover({
            html : true,
            placement: 'bottom',
            title: function() {
                return $(this).data('popover-title');
            },
            content: function() {
                //console.log($(this).next('.popover-content'));
                return `<form action="/rent/`+$(this).data('book-id')+`" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="from_date" class="col-sm-4 control-label">From:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="from_date" name="start_at" placeholder="Start from" data-toggle="datepicker">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="to_date" class="col-sm-4 control-label">To:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="to_date" name="end_at" placeholder="End at" data-toggle="datepicker">
                            </div>
                        </div>
                        <div style="text-align:center">
                            <button class="btn btn-primary">Rent</button>
                        </div>
                    </form>`;
            }
        });
        $(".jsRent").on('shown.bs.popover', function (event) {
            $('[data-toggle="datepicker"]').flatpickr();
        });
    </script>
@endsection