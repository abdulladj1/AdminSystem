<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agama;


class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
        {
            $agama = Agama::all();
            return view('agama.index', compact('agama'));
        }

    public function indexapi()
    {
        $agama = Agama::all();
        return response()->json($agama, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agama.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $agama = new Agama;
        $agama->nama_agama = $request->nama_agama;
        $agama->save();

        return redirect('/agama');
    }

    public function storeapi(Request $request)
    {
        $agama = new Agama;
        $agama->nama_agama = $request->nama_agama;
        $agama->save();
        return response()->json($agama, 201);
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
        $agama = Agama::findOrFail($id);
        return response()->json($agama, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agama = Agama::find($id);
        return view('agama.edit', compact('agama'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $agama = Agama::find($id);
        $agama->nama_agama = $request->nama_agama;
        $agama->save();

        return redirect('/agama');
    }

    public function updateapi(Request $request, string $id)
    {
        $agama = Agama::find($id);
        
        if (!$agama) {
            return response()->json(['message' => 'Agama not found'], 404);
        }

        $agama->nama_agama = $request->nama_agama;
        $agama->save();

        return response()->json($agama, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agama = Agama::find($id);
        $agama->delete();

        return redirect('/agama');
    }

    public function destroyapi(string $id)
    {
        $agama = Agama::find($id);

        if (!$agama) {
            return response()->json(['message' => 'Agama not found'], 404);
        }

        $agama->delete();

        return response()->json(['message' => 'Agama deleted successfully'], 200);
    }
}
