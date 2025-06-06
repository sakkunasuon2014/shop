<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('book.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255', // Changed from 'name' to 'title'
            'description' => 'required',
            'author' => 'required|max:255',
            'year' => 'required|integer|min:1000|max:' . date('Y'),
        ]);

        // Create The Book
        $book = new Book;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->year = $request->year;
        $book->save();

        Session::flash('book_create', 'Book is created.');
        return redirect('/book'); // Redirect to index instead of create
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('book.edit')->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255', // Changed from 'name' to 'title'
            'description' => 'required',
            'author' => 'required|max:255',
            'year' => 'required|integer|min:1000|max:' . date('Y'),
        ]);

        if ($validator->fails()) {
            return redirect('book/' . $id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }

        // Update The Book
        $book = Book::find($id);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->year = $request->year;
        $book->save();

        Session::flash('book_update', 'Book is updated.');
        return redirect('book'); // Redirect to index instead of edit page
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        Session::flash('book_delete', 'Book is deleted.');
        return redirect('book');
    }
}
