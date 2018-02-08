@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>
                @if(isset($book))
                    Edit book
                @else
                    Add new book
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
    
    <form action="{{isset($book) ? route('book.update', ['book' => $book->id]) : route('book.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ isset($book) ? method_field('PATCH') : ''}}

        <div class="form-group">
            <label for="book-name" class="col-sm-2 control-label">Name:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="book-name" name="name" value="{{isset($book) ? $book->name : old('name')}}" placeholder="Book name...">
            </div>
        </div>

        <div class="form-group">
            <label for="book-author" class="control-label col-sm-2">Author:</label>
            <div class="col-sm-4">
                <select name="author_id" id="book-author" class="form-control jsSelectAuthor">
                    <option></option>
                    @foreach($authors as $author)
                        <option
                            value="{{$author->id}}"
                            {{ isset($book) && $author->id == $book->author->id ? 'selected' : ''}}
                        >
                            {{$author->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="book-tag" class="control-label col-sm-2">Tags:</label>
            <div class="col-sm-4">
                <select name="tags[]" id="book-tag" class="form-control jsSelectTags" multiple>
                    @foreach($tags as $tag)
                        <option
                            value="{{$tag->id}}"
                            {{ isset($book) && $book->tags->contains($tag) ? 'selected' : ''}}
                        >{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="book-description" class="col-sm-2 control-label">Description:</label>
            <div class="col-sm-4">
                <textarea class="form-control" rows="8" id="book-description" name="description" placeholder="Lorem ipsum...">{!!isset($book) ? $book->description : old('description')!!}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="book-description" class="col-sm-2 control-label">Cover:</label>
            <div class="col-sm-4">
                <input type="file" name="cover_image" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                <button class="btn btn-primary">Save</button>
                <a href="{{route('book.index')}}" class="btn btn-defalut">Cancel</a>
            </div>
        </div>
    </form>



@endsection

@section('scripts')
    <script>
        $(".jsSelectAuthor").select2({
            theme: "bootstrap",
            placeholder: "Select the author"
        });
        $(".jsSelectTags").select2({
            theme: "bootstrap",
            placeholder: "Select tags",
            tags: true          
        });
    </script>
@endsection