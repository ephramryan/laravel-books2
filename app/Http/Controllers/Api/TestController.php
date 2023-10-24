<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class TestController extends Controller
{
    function arrayResponse() 
    {
        return [
            'The Shawshank redemption',
            'The Godfather',
            'The Godfather II',
            'Dark Knight', 
            '12 angry men', 
            'Schindler\'s list',
            'Pulp fiction',
            'Lord of the Rings: Return of the King',
            'The good, the bad and the ugly',
            'Fight club'
        ];
    }

    function modelResponse()
    {
        $book = Book::find(11206);

        return $book;
    }

    function collectionResponse()
    {
        $books = Book::where('title', 'like', '%harry potter%')->get();

        return $books;
    }
}
