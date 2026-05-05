<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        //Obtengo todos los pedidos del usuario logeado con sus prodcutos incluidos, ordenados
        $orders = auth()->user()->orders()->with('editions')->latest()->get();

        return view('account.orders.index', compact('orders'));
    }
}
