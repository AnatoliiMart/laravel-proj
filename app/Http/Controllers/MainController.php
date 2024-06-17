<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Review;

class MainController extends Controller
{
    public function index()
    {
        $books = Book::with('genre')->latest()->paginate(12);

        return view('client.index', compact('books'));
    }
    public function contacts()
    {
        return view('client.contacts');
    }

    public function reviews()
    {
        $reviews = Review::all();

        // dd($reviews);
        return view('client.reviews', compact('reviews'));
    }
    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'message' => 'required|min:5|max:500'
        ]);
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
