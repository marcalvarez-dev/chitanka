<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
}
