<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Books;

class BookController extends Controller
{

    public function index()
    {

        $books = Books::all();
        return view('books.index', compact('books'));
    }
}
