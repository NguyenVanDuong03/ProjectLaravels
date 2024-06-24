<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::all();
        $books = Book::orderByDesc('bookid')->get();
        return view('index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'publicationYear' => 'required',
        ]);
        $book = new Book();
        $book->title = $validator['title'];
        $book->author = $validator['author'];
        $book->genre = $validator['genre'];
        $book->publicationYear = $validator['publicationYear'];
        $book->save();
        return redirect()->route('books.index')->with('success', 'Book Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $book_id)
    {
        //
        $validator = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'publicationYear' => 'required',
        ]);
        $book = Book::find($book_id);
        $book->title = $validator['title'];
        $book->author = $validator['author'];
        $book->genre = $validator['genre'];
        $book->publicationYear = $validator['publicationYear'];
        $book->save();
        return redirect()->route('books.index')->with('success', 'Book Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
