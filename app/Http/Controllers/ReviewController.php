<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function reviewBook(Request $request, $book_id)
    {
        $this->validate($request, [
            'text' => 'required|max:255'
        ]);

        // let's make sure that we are not reviewing
        // a book that does not exist
        $book = Book::findOrFail($book_id);

        $user_id = Auth::id();

        // try to find an existing review from this user
        // for this book
        $review = Review::where([
            'book_id' => $book_id,
            'user_id' => $user_id
        ])->first();

        if (!$review) {
            // if not found, create a new one
            $review = new Review;
            $review->book_id = $book_id;
            $review->user_id = $user_id;
        }

        // update the text
        $review->text = $request->post('text');

        // save
        $review->save();

        session()->flash('success_message', 'Review was successfully saved');

        return redirect()->route('book.show', $book->id);
    }
}
