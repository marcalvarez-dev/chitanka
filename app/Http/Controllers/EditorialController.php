<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\EditorialRequest;

class EditorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $editorials = Editorial::all();
        return view('editorial', compact('editorials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('create_editorial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EditorialRequest $request): RedirectResponse
    {
        Editorial::create($request->all());
        return redirect()->route('editorial.index')->with('succes', 'Editorial creada');
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
    public function edit(Editorial $editorial): View
    {
        return view('edit', compact('editorial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditorialRequest $request, Editorial $editorial): RedirectResponse
    {
        $editorial->update($request->all());
        return redirect()->route('editorial.index')->with('succes', 'Editorial modificada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Editorial $editorial)
    {
        $editorial->delete();
        return redirect()->route('editorial.index')->with('danger', 'Editorial eliminada');
    }
}
