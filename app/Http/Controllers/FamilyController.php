<?php

namespace App\Http\Controllers;

use App\Models\Family; 
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $families = Family::all();
        return view('families.index', compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $families = Family::all();
        return view('families.create', compact('families'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'parent_id' => 'required|exists:families,id'
        ]);

        Family::create($request->all());
        return redirect()->route('families.index')->with('success', 'Family member created successfully.');
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
    public function edit(Family $family)
    {
        $families = Family::all();
        return view('families.edit', compact('family', 'families'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Family $family)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'parent_id' => 'required|exists:families,id'
        ]);

        $family->update($request->all());
        return redirect()->route('families.index')->with('success', 'Family member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Family $family)
    {
        $family->delete();
        return redirect()->route('families.index')->with('success', 'Family member deleted successfully.');
    }
}
