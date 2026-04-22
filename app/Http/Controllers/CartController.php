<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edition;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Address;
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

        return view('cart.index', compact('cart'));
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

    public function checkout(Request $request)
    {
        $cart = Cart::with('items.edition')
            ->where('user_id', auth()->id())
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->back();
        }

        $order = null;
        $total = 0;
        $address = Address::find($request->address_id);


        DB::transaction(function () use ($cart, $request, &$order, &$total) {
            $order = Order::create([
                'user_id' => auth()->id(),
                'address_id' => $request->address_id,
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
            ->send(new OrderCreateMail(
                auth()->user()->name,
                now(),
                $address,
                $cart->items,
                $total
            ));

        return redirect()->route('cart.index')->with('success', 'Pedido realizado');
    }

    public function review()
    {
        $cart = Cart::with('items.edition')->where('user_id', auth()->id())->first();

        $addresses = auth()->user()->addresses;

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index');
        }

        return view('checkout.index', compact('cart', 'addresses'));
    }

    public function checkoutForm(Request $request)
    {
        $cart = Cart::with('items.edition')->where('user_id', auth()->id())->first();

        $addresses = Address::where('user_id', auth()->id())->get();

        $shipping = $request->shipping_method ?? null;

        return view('checkout.index', [
            'cart' => $cart,
            'addresses' => $addresses,
            'shipping' => $request->shipping_method
        ]);
    }
}
