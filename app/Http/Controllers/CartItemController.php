<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartItemRequest;
use App\Models\CartItem;
use App\Models\Cart;
use App\Models\Edition;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CartItemRequest $request): RedirectResponse
    {
        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id()
        ]);

        $item = CartItem::where('cart_id', $cart->id)->where('edition_id', $request->edition_id)->first();

        if ($item) {
            $item->quantity++;
            $item->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'edition_id' => $request->edition_id,
                'quantity' => 1,
                'price' => Edition::find($request->edition_id)->price
            ]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $item = CartItem::find($id);
        $item->delete();
        return redirect()->route('cart.index');
    }
}
