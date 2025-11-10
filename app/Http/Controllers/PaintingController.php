<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Painting;
use Illuminate\Http\Request;

class PaintingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $paintings = Painting::all();
        return view('paintings.index', compact('paintings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('paintings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'year' => 'required|integer',
        ]);

        Painting::create($request->all());
        return redirect()->route('paintings.index')
                         ->with('success', 'Painting added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Painting $painting)
    {
        //
        return view('paintings.show', compact('painting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Painting $painting)
    {
        //
        return view('paintings.edit', compact('painting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Painting $painting)
    {
        //
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'year' => 'required|integer',
        ]);

        $painting->update($request->all());
        return redirect()->route('paintings.index')
                         ->with('success', 'Painting updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Painting $painting)
    {
        //
        $painting->delete();
        return redirect()->route('paintings.index')
                         ->with('success', 'Painting deleted successfully!');
    }
}
