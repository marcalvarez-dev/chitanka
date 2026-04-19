<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edition;
use App\Models\Book;
use App\Models\Editorial;
use App\Models\Author;
use App\Http\Requests\EditionRequest;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //Ediciones con sus libros
        $editions = Edition::with('book')->get();

        //Todos los generos
        $genres = Book::select('genre')->distinct()->pluck('genre');

        //Array vacio para guardar genereo y sus ediciones
        $editionsByGenre = [];

        //Recorro todas las ediciones
        foreach ($editions as $edition) {

            $genre = $edition->book->genre;

            if (!isset($editionsByGenre[$genre])) {
                $editionsByGenre[$genre] = [];
            }

            //Meto edicion dentro del grupo
            $editionsByGenre[$genre][] = $edition;
        }

        //Envio a la vista un mapa de arrays
        return view('welcome', compact('editionsByGenre', 'genres'));
    }

    public function details($id): View
    {
        $edition = Edition::find($id);
        return view('editions.details', compact('edition'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $books = Book::all();
        $editorials = Editorial::all();
        $authors = Author::all();


        return view('editions.create', compact('books', 'editorials', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->book_id) {
            $book = Book::find($request->book_id);
            $bookId = $book->id;
        } else {
            $book = Book::create([
                'title' => $request->new_title,
                'genre' => $request->genre,
            ]);

            $bookId = $book->id;
        }

        if ($request->authors) {
            $book->authors()->sync($request->authors);
        }

        // crear edición
        Edition::create([
            'isbn' => $request->isbn,
            'title' => $request->title,
            'language' => $request->language,
            'price' => $request->price,
            'stock' => $request->stock,
            'format' => $request->format,
            'publication_date' => $request->publication_date,
            'synopsis' => $request->synopsis,
            'editorial_id' => $request->editorial_id,
            'book_id' => $bookId,
        ]);

        //edition::create($request->all());
        return redirect()->route('edition.index')->with('succes', 'Libro creado');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Edition $edition): View
    {
        $authors = Author::all();
        $editorials = Editorial::all();
        $books = Book::all();


        return view('editions.edit', compact('edition', 'authors', 'books', 'editorials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditionRequest $request, Edition $edition): RedirectResponse
    {
        $edition->update($request->all());
        return redirect()->route('edition.index')->with('succes', 'Libro modificado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Edition $edition): RedirectResponse
    {
        $edition->delete();
        return redirect()->route('edition.index')->with('danger', 'Libro eliminado');
    }

    public function filterByGenre($genre)
    {
        $editions = Edition::with('book')->get();

        $filter = [];

        foreach ($editions as $edition) {
            if ($edition->book->genre == $genre) {
                $filter[] = $edition;
            }
        }

        $genres = Book::select('genre')->distinct()->pluck('genre');

        $editionsByGenre = [
            $genre => $filter
        ];

        return view('welcome', compact('editionsByGenre', 'genres'));
    }
}
