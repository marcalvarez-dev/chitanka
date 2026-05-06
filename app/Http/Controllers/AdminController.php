<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $filter = Order::with(['user', 'address', 'editions']);

        if ($request->filled('status')) {
            $filter->where('status', $request->status);
        }

        if ($request->filled('from')) {
            $filter->whereDate('created_at', '>=', $request->from);
        }

        if ($request->filled('to')) {
            $filter->whereDate('created_at', '<=', $request->to);
        }

        $orders = $filter->latest()->paginate(10);

        return view('admin.index', compact('orders'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load(['user', 'address', 'editions']);
        return view('admin.show', compact('order'));
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
    public function destroy(string $id)
    {
        //
    }
}
