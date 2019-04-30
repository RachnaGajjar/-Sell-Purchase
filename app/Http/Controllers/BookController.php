<?php

namespace App\Http\Controllers;
use App\Book;
use Illuminate\Http\Request;
use  App\Http\Requests\BookFormRequest;
use App\UserBook;
use Auth;
use Image;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return('rachna');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $isbn = $request->isbn;
        $isbn10 = $isbn13 = '';

        if(strlen($isbn) == 10) $isbn10 = $isbn;
        if(strlen($isbn) == 13) $isbn13 = $isbn;

        $book = Book::where('isbn10', $isbn)->orWhere('isbn13', $isbn)->first();
         return view('books.form', compact('isbn', 'isbn10', 'isbn13', 'book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookFormRequest $request)
    {
        if(@$request->book_id) {
        $userBook= new UserBook;
        $userBook->user()->associate(Auth::user());
        $userBook->book_id=$request->book_id;
        $userBook->selling_price=$request->selling_price;
        $userBook->save();
        }
        else
        {
            $book = new Book;
            if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('uploads/books/'.$filename));
            $book->image = $filename;
            }
            $book->title = $request->title;
            $book->description = $request->description;
            $book->author = $request->author;
            $book->mrp = $request->mrp;
            $book->isbn10 = $request->isbn10;
            $book->isbn13 = $request->isbn13;
            $book->save();

            $userBook = new UserBook;
            $userBook->user()->associate(Auth::user());
            $userBook->book()->associate($book);
            $userBook->selling_price = $request->selling_price;
            $userBook->save();
    }
        return redirect()->route('home');
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserBook $book)
    {
        //
         $book->delete();
        return redirect()->route('home');
    }
    public function sold(UserBook $book)
    {


        //return ($book);
        $book->sold = true;
        $book->save();
        return redirect()->route('home');
        
    }

  
}
