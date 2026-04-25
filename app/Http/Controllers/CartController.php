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
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CartController extends Controller
{
    public function index(): View
    {
        $cart = Cart::with('items.edition')
            ->firstOrCreate([
                'user_id' => auth()->id()
            ]);


        return view('cart.index', compact('cart'));
    }

    public function add($id): RedirectResponse
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

    public function checkout(Request $request): RedirectResponse
    {
        $cart = Cart::with('items.edition')
            ->where('user_id', auth()->id())
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->back();
        }

        $order = null;
        $total = 0;
        $addressId = null;
        $address = null;


        if ($request->shipping_method !== 'pickup') {
            $addressId = $request->address_id;
            $address = Address::find($addressId);
        }


        $items = $cart->items;

        DB::transaction(function () use ($cart, $request, &$order, &$total, $addressId) {
            $order = Order::create([
                'user_id' => auth()->id(),
                'address_id' => $addressId,
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

    public function checkoutForm(Request $request): View
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

    public function clear()
    {
        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id()
        ]);

        $cart->items()->delete();

        return back();
    }
}
