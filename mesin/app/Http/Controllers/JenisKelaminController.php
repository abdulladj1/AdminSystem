<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKelamin;

class JenisKelaminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jeniskelamin = JenisKelamin::all();
        return view('jeniskelamin.index', compact('jeniskelamin'));
    }

    public function indexapi()
    {
        $jeniskelamin = JenisKelamin::all();
        return response()->json($jeniskelamin, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jeniskelamin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jeniskelamin = new JenisKelamin;
        $jeniskelamin->jenisKelamin = $request->jenisKelamin;
        $jeniskelamin->save();

        return redirect('/jeniskelamin');
    }

    public function storeapi(Request $request)
    {
        $jeniskelamin = new JenisKelamin;
        $jeniskelamin->jenisKelamin = $request->jenisKelamin;
        $jeniskelamin->save();
        return response()->json($jeniskelamin, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function showapi(string $id)
    {
        $jeniskelamin = JenisKelamin::findOrFail($id);
        return response()->json($jeniskelamin, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jeniskelamin = JenisKelamin::find($id);
        return view('jeniskelamin.edit', compact('jeniskelamin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jeniskelamin = JenisKelamin::find($id);
        $jeniskelamin->jenisKelamin = $request->jenisKelamin;
        $jeniskelamin->save();

        return redirect('/jeniskelamin');
    }

    public function updateapi(Request $request, string $id)
    {
        $jeniskelamin = JenisKelamin::find($id);
        
        if (!$jeniskelamin) {
            return response()->json(['message' => 'Jenis kelamin not found'], 404);
        }

        $jeniskelamin->jenisKelamin = $request->jenisKelamin;
        $jeniskelamin->save();

        return response()->json($jeniskelamin, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jeniskelamin = JenisKelamin::find($id);
        $jeniskelamin->delete();

        return redirect('/jeniskelamin');
    }

    public function destroyapi(string $id)
    {
        $jeniskelamin = JenisKelamin::find($id);

        if (!$jeniskelamin) {
            return response()->json(['message' => 'Jenis kelamin not found'], 404);
        }

        $jeniskelamin->delete();

        return response()->json(['message' => 'Jenis kelamin deleted successfully'], 200);
    }
}
