<?php

namespace App\Http\Controllers;

use App\Http\Requests\LanguageRequest;
use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $languages = Language::all();

        return view('languages.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LanguageRequest $request): RedirectResponse
    {
        Language::create([
            'name' => $request->name,
        ]);

        return redirect()->route('languages.index');
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
    public function update(LanguageRequest $request, Language $language): RedirectResponse
    {
        $language->update([
            'name' => $request->name,
        ]);

        return redirect()->route('languages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language): RedirectResponse
    {
        $language->delete();

        return redirect()->route('languages.index');
    }
}
