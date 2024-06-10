<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendidikan;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendidikan = Pendidikan::all();
        return view('pendidikan.index', compact('pendidikan'));
    }

    public function indexapi()
    {
        $pendidikan = Pendidikan::all();
        return response()->json($pendidikan, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pendidikan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pendidikan = new Pendidikan;
        $pendidikan->pendidikan = $request->pendidikan;
        $pendidikan->save();

        return redirect('/pendidikan');
    }

    public function storeapi(Request $request)
    {
        $pendidikan = new Pendidikan;
        $pendidikan->pendidikan = $request->pendidikan;
        $pendidikan->save();
        return response()->json($pendidikan, 201);
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
        $pendidikan = Pendidikan::findOrFail($id);
        return response()->json($pendidikan, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pendidikan = Pendidikan::find($id);
        return view('pendidikan.edit', compact('pendidikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pendidikan = Pendidikan::find($id);
        $pendidikan->pendidikan = $request->pendidikan;
        $pendidikan->save();

        return redirect('/pendidikan');
    }

    public function updateapi(Request $request, string $id)
    {
        $pendidikan = Pendidikan::find($id);
        
        if (!$pendidikan) {
            return response()->json(['message' => 'Pendidikan not found'], 404);
        }

        $pendidikan->pendidikan = $request->pendidikan;
        $pendidikan->save();

        return response()->json($pendidikan, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pendidikan = Pendidikan::find($id);
        $pendidikan->delete();

        return redirect('/pendidikan');
    }

    public function destroyapi(string $id)
    {
        $pendidikan = Pendidikan::find($id);

        if (!$pendidikan) {
            return response()->json(['message' => 'Pendidikan not found'], 404);
        }

        $pendidikan->delete();

        return response()->json(['message' => 'Pendidikan deleted successfully'], 200);
    }
}