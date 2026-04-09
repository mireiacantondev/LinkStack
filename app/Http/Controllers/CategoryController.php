<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
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
        // Validamos que el nombre sea obligatorio y el color sea un texto (hexadecimal)
        $request->validate([
            'name' => 'required|string|max:50',
            'color' => 'nullable|string|max:7', 
        ]);

        // Creamos la categoría asociada al usuario identificado
        auth()->user()->categories()->create([
            'name' => $request->name,
            'color' => $request->color ?? '#6A6ECF', // Si no elige color, usamos tu púrpura
        ]);

        return back()->with('success', '¡Categoría creada!');
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
    public function destroy(string $id)
    {
        //
    }
}
