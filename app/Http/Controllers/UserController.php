<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class UserController extends Controller
{
    public function index()
    {
        $authors = Author::with('books')->get();
        return view('login', compact('authors'));
    }
}
