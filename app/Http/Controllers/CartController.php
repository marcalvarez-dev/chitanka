<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edition;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreateMail;



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

    public function checkout()
    {
        $cart = Cart::with('items.edition')
            ->where('user_id', auth()->id())
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->back();
        }

        $order = null;

        DB::transaction(function () use ($cart) {

            $order = Order::create([
                'user_id' => auth()->id(),
                'address_id' => auth()->user()->addresses()->first()->id,
                'status' => 'pending',
                'date' => now(),
                'total_price' => 0,
            ]);

            $total = 0;

            foreach ($cart->items as $item) {

                $price = $item->edition->price;

                $order->editions()->attach($item->edition_id, [
                    'quantity' => $item->quantity,
                    'unitary_price' => $price,
                ]);

                $total += $price * $item->quantity;
            }

            $order->update([
                'total_price' => $total
            ]);

            $cart->items()->delete();
        });

        Mail::to(auth()->user()->email)
            ->send(new OrderCreateMail($order));

        return redirect()->route('cart.index')->with('success', 'Pedido realizado');
    }
}
