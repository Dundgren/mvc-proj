<?php

namespace Dundgren\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dundgren\Models\Book;

class BookController extends Controller
{
    public function getData()
    {
        $books = [];
        foreach (Book::all() as $book) {
            array_push($books, $book);
        }

        return view("book.index", [
            "books" => $books,
        ]);
    }
}
