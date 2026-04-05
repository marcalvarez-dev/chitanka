<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{

    public function index(): View
    {
        $books = Book::all();
        return view('welcome', compact('books'));
    }

    public function details($id): View
    {
        $book = Book::find($id);
        return view('books.product', compact('book'));
    }

    public function create(): View
    {
        return view('books.create');
    }

    public function store(BookRequest $request): RedirectResponse
    {

        /*   $book = new Book;
        $book->title = "Kobzal";
        $book->genre = "Poesía";
        $book->book_language = "Ucraniano";
        $book->save();

        Book::create([
            "title" => "El Hobbit",
            "genre" => "Novela",
            "book_language" => "Inglés"
        ]); */


        /**$request -> all() funciona si el name de los campso del form es igual que lso campso de la tabla de la bbdd */
        Book::create($request->all());
        return redirect()->route('book.index')->with('succes', 'Libro creado');
    }

    public function edit(Book $book): View
    {
        //$myBook = Book:.find($book);
        return view('books.edit', compact('book'));
    }

    public function update(BookRequest $request, Book $book): RedirectResponse
    {


        $book->update($request->all());
        return redirect()->route('book.index')->with('succes', 'Libro modificado');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect()->route('book.index')->with('danger', 'Libro eliminado');
    }
}
