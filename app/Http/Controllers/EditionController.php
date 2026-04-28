<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edition;
use App\Models\Book;
use App\Models\Editorial;
use App\Models\Author;
use App\Http\Requests\EditionRequest;
use App\Models\Category;
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
        $editions = Edition::with('book.category')->get();

        //Todos los generos unicos
        $genres = Category::pluck('name');

        //Array vacio para guardar genero y sus ediciones
        $editionsByGenre = [];

        //Recorro todas las ediciones
        foreach ($editions as $edition) {

            //Saco genero del libro
            $genre = $edition->book->category->name;

            //Si no existe el genero lo creo
            if (!isset($editionsByGenre[$genre])) {
                $editionsByGenre[$genre] = [];
            }

            //Meto edition dentro de su genero
            $editionsByGenre[$genre][] = $edition;
        }

        $genres = Category::pluck('name');

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
        $categories = Category::all();


        return view('editions.create', compact('books', 'editorials', 'authors', 'categories'))->with('book', null);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EditionRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img/covers'), $filename);
            $data['cover'] = $filename;
        } else {
            $data['cover'] = 'default.jpg';
        }

        $author = Author::firstOrCreate([
            'name' => trim($request->author)
        ]);

        if ($request->book_id) {
            $book = Book::find($request->book_id);
        } else {
            $book = Book::create([
                'title' => $request->new_title,
                'category_id' => $request->genre,
                'author_id' => $author->id,

            ]);
        }

        $data['book_id'] = $book->id;
        $data['editorial_id'] = $request->editorial_id;

        Edition::create($data);

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
        $genres = Category::all();



        return view('editions.edit', compact('edition', 'authors', 'books', 'editorials', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditionRequest $request, Edition $edition): RedirectResponse
    {
        $info = $request->except('category_id');
        $edition->update($info);

        if ($request->has('category_id')) {
            $edition->book->category_id = $request->category_id;
            $edition->book->save();
        }

        //Actualizo la edicion con los datos que vienen de la request
        //$edition->update($request->all());
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
            $g = $edition->book->category->name;

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
            $genre = $edition->book->category->name;

            if (!isset($editionsByGenre[$genre])) {
                $editionsByGenre[$genre] = [];
            }

            $editionsByGenre[$genre][] = $edition;
        }

        return view('welcome', compact('editionsByGenre'));
    }

    public function createFromBook(Book $book)
    {
        $books = Book::all();
        $editorials = Editorial::all();
        $authors = Author::all();
        $categories = Category::all();


        return view('editions.create', compact('books', 'editorials', 'authors', 'categories'));
    }
}
