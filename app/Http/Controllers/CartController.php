<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edition;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::with('items.edition')
            ->where('user_id', auth()->id())
            ->first();

        return view('cart', compact('cart'));
    }

    public function add($id)
    {
        $edition = Edition::find($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "title" => $edition->title,
                "price" => $edition->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('edition.index');
    }
}
