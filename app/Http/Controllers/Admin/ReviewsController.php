<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50',
            'review' => 'required|max:500',
            'book_id' => 'required|exists:books,id',
        ]);
        Review::create($request->all());
        return back()->with('success', 'Thanks for your review');
    }

    public function edit(Review $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'name' => 'required',
            'review' => 'required|max:500',
            'book_id' => 'required|exists:books,id',
        ]);
        $review->update($request->all());
        return to_route('book.show', ["book" => $review->book_id])->with('success', 'Review updated successfully');
    }
    
    public function destroy(Review $review)
    {
        $bookName = $review->book->name;
        $review->delete();

        return back()->with('success', "Review of $review->name on book $bookName was deleted sucessfully");
    }
}
