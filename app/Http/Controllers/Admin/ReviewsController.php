<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();
        $books= Book::pluck('name','id')->all();
        return view('admin.reviews.index', compact('reviews', 'books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50',
            'review' => 'required|max:500',
            'book_id' => 'required|exists:books,id',
        ]);
        Review::create($request->all());
        return to_route('reviews.index')->with('success', 'Thanks for your review');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $bookName = $review->book->name;
        $review->delete();

        return back()->with('success', "Review of $review->name on book $bookName was deleted sucessfully");
    }
}
