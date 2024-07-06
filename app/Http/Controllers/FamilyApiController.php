<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Family;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FamilyApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $families = Family::all();
        return response()->json(['data' => $families], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'parent_id' => 'required|exists:families,id'
        ]);

       
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        
        $family = Family::create($request->all());
    
       
        return response()->json(['message' => 'Family member created successfully', 'data' => $family], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $family = Family::find($id);
        if (!$family) {
            return response()->json(['message' => 'Family member not found'], 404);
        }
        return response()->json(['data' => $family], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $family = Family::find($id);
    
        if (!$family) {
            return response()->json(['message' => 'Family member not found'], 404);
        }
    
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'parent_id' => 'required|exists:families,id'
        ]);
    
        // Check if the parent_id can be updated
        if ($request->has('parent_id') && $request->parent_id !== $family->parent_id) {
            $childFamilies = Family::where('parent_id', $id)->count();
            if ($childFamilies > 0) {
                return response()->json(['message' => 'Cannot update parent_id because there are child families linked to this family member'], 422);
            }
        }
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $family->nama = $request->nama;
        $family->jenis_kelamin = $request->jenis_kelamin;
        $family->parent_id = $request->parent_id;
        $family->save();
    
        return response()->json(['message' => 'Family member updated successfully', 'data' => $family], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $family = Family::find($id);
        if (!$family) {
            return response()->json(['message' => 'Family member not found'], 404);
        }
    
        // Check if there are child families linked to this family member
        $childFamilies = Family::where('parent_id', $id)->count();
        if ($childFamilies > 0) {
            return response()->json(['message' => 'Cannot delete this family member because there are child families linked to it'], 422);
        }
    
        $family->delete();
        return response()->json(['message' => 'Family member deleted successfully'], 200);
    }
    
}
