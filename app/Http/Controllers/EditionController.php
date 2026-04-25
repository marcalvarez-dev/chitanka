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
        //Ediciones con sus libros relacionados
        $editions = Edition::with('book')->get();

        //Todos los generos unicos
        $genres = Book::select('genre')->distinct()->pluck('genre');

        //Array vacio para guardar genero y sus ediciones
        $editionsByGenre = [];

        //Recorro todas las ediciones
        foreach ($editions as $edition) {

            //Saco genero del libro
            $genre = $edition->book->genre;

            //Si no existe el genero lo creo
            if (!isset($editionsByGenre[$genre])) {
                $editionsByGenre[$genre] = [];
            }

            //Meto edition dentro de su genero
            $editionsByGenre[$genre][] = $edition;
        }

        //Envio a la vista un mapa de arrays
        return view('welcome', compact('editionsByGenre', 'genres'));
    }

    public function details($id): View
    {
        //Busco por id
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
    public function store(EditonRequest $request): RedirectResponse
    {
        //Si existe el libro me lo guardo, si no existe lo creo
        if ($request->book_idi) {
            $book = Book::find($request->book_id);
        } else {
            $book = Book::create([
                'title' => $request->new_title,
                'genre' => $request->genre,
            ]);
        }

        //Adigno autores a un libro y sustituyo los anteriores por los nuevos
        if ($request->filled('authors')) {
            $book->authors()->sync($request->authors);
        }

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
            'book_id' => $book->id,
        ]);

        return redirect()->route('edition.index')->with('success', 'Libro creado');
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
        //Actualizo la edicion con los datos que vienen de la request
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

    // Todos los géneros (igual que index)
    $editionsByGenre = [];

    foreach ($editions as $edition) {
        $g = $edition->book->genre;

        if (!isset($editionsByGenre[$g])) {
            $editionsByGenre[$g] = [];
        }

        $editionsByGenre[$g][] = $edition;
    }

    // Solo los libros del género seleccionado
    $filteredEditions = $editionsByGenre[$genre] ?? [];

    return view('welcome', compact('editionsByGenre', 'filteredEditions', 'genre'));
 }

    public function search(Request $request)
    {
        $q = $request->q;

        $editions = Edition::with('book')
            ->where('title', 'like', '%' . $q . '%')
            ->get();

        $editionsByGenre = [];

        foreach ($editions as $edition) {
            $genre = $edition->book->genre;

            if (!isset($editionsByGenre[$genre])) {
                $editionsByGenre[$genre] = [];
            }

            $editionsByGenre[$genre][] = $edition;
        }

        return view('welcome', compact('editionsByGenre'));
    }
}
