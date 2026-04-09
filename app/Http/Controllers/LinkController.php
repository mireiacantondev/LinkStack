<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        auth()->user()->links()->create([
            'title' => $request->title,
            'url' => $request->url,
            'category_id' => $request->category_id,
            'order' => 0, // Por ahora por defecto
            'is_active' => true,
        ]);

        return back()->with('success', 'Enlace añadido correctamente');
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
    public function edit(Link $link)
    {
        if ($link->user_id !== auth()->id()) { abort(403); }

        $categories = auth()->user()->categories; 
        return view('links.edit', compact('link', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        if ($link->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $link->update([
            'title' => $request->title,
            'url' => $request->url,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('dashboard')->with('success', '¡Enlace actualizado con éxito!');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        if ($link->user_id !== auth()->id()) {
            abort(403);
        }

        $link->delete();

        return back()->with('success', 'Enlace eliminado');
    }
}
