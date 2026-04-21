<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->with('editions')->latest()->get();

        return view('account.history.index', compact('orders'));
    }
}
