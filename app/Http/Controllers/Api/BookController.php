<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function latest()
    {
        return Book::orderBy('publication_date', 'desc')
            ->with('authors')
            ->limit(10)
            ->get();
    }

    public function show($book_id)
    {
        $book = Book::findOrFail($book_id);

        $reviews = $book->reviews()
            ->with('user')
            ->orderBy('updated_at', 'desc')
            ->get();

        // find the review that this user submitted
        // if there is a user logged-in
        if (Auth::check()) {
            $users_review = $book->reviews()
                ->where('user_id', Auth::id())
                ->first();
        } else {
            $users_review = null;
        }

        return view('book.show', compact(
            'book',
            'reviews',
            'users_review'
        ));
    }
}
