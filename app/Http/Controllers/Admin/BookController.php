<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Review;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('genre')->latest()->paginate(5);

        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all()->pluck('name', 'id');
        return view('admin.books.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:books,name',
            'genre_id' => 'required|exists:genres,id',
        ]);


        $book = Book::create($request->all());
        if ($request->image) {
            $path = $request->image->store('test');
            $book->image = '/storage/' . $path;
            $book->save();
        }

        return to_route('books.index')->with('success', 'Book added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $genres = Genre::all()->pluck('name', 'id');
        $reviews = Review::where('book_id', $book->id)->get();
        return view('admin.books.edit', compact('book', "genres", 'reviews'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required|unique:books,name',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $book->update($request->all());
        if ($request->image) {
            $path = $request->image->store('test');
            $book->image = '/storage/' . $path;
            $book->save();
        }
        return to_route('books.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return to_route('books.index')->with('success', 'Book deleted successfully');
    }
}
