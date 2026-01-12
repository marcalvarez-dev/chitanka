<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

class BookController extends Controller
{

    public function index()
    {

        $books = Book::all();
        return view('welcome', compact('books'));
    }

    public function create()
    {
        $book = new Book;
        $book->title = "Kobzal";
        $book->genre = "Poesía";
        $book->book_language = "Ucraniano";
        $book->save();

        Book::create([
            "title" => "El Hobbit",
            "genre" => "Novela",
            "book_language" => "Inglés"
        ]);

        return redirect()->route('book.index');
    }
}
