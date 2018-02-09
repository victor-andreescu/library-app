<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = \App\Book::all();
        // dd(\Auth::user()->books);
        return view('book.index')->with([
            'books' => $books,
            'myRents' => \Auth::user()->books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.form')->with([
            'authors' => \App\Author::all(),
            'tags' => \App\Tag::all()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'author_id' => 'required|numeric',
            'tags' => 'required|array',
            'tags.*' => 'numeric',
            'cover_image' => 'required|image|max:2000',
            'description' => 'required|string'
        ]);

        // file upload
        $path = $request->file('cover_image')->store('book-covers', 'public');
        $book = $request->all();
        $book['cover_image'] = $path;
        $book = \App\Book::create($book);
        
        $book->tags()->attach($request['tags']);
        
        // create with relationship
        // save tags


        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Book $book)
    {
        return view('book.form')->with([
            'book' => $book,
            'authors' => \App\Author::all(),
            'tags' => \App\Tag::all()
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Book $book)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'author_id' => 'required|numeric',
            'tags' => 'required|array',
            'tags.*' => 'numeric',
            'cover_image' => 'image|max:2000',
            'description' => 'required|string'
        ]);

        $tmp = $request->all();
        unset($tmp['tags']);

        if ( $request->hasFile('cover_image') ) {
            \File::delete(public_path($book->cover_image));
            $path = $request->file('cover_image')->store('book-covers', 'public');
            $tmp['cover_image'] = $path;
        } else {
            $tmp['cover_image'] = $book->cover_image;
        }

        $book->update($tmp);
        $book->tags()->sync($request['tags']);
        

        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Book $book)
    {
        \File::delete(public_path($book->cover_image));
        $book->delete();

        return back();
    }
}
