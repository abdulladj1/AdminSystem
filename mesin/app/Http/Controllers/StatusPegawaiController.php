<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusPegawai;

class StatusPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuspegawai = StatusPegawai::all();
        return view('statuspegawai.index', compact('statuspegawai'));
    }

    public function indexapi()
    {
        $statuspegawai = StatusPegawai::all();
        return response()->json($statuspegawai, 200);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('statuspegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $statuspegawai = new StatusPegawai;
        $statuspegawai->statusPegawai = $request->statusPegawai;
        $statuspegawai->save();

        return redirect('/statuspegawai');
    }

    public function storeapi(Request $request)
    {
        $statuspegawai = new StatusPegawai;
        $statuspegawai->statusPegawai = $request->statusPegawai;
        $statuspegawai->save();
        return response()->json($statuspegawai, 201);
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
        $statuspegawai = StatusPegawai::findOrFail($id);
        return response()->json($statuspegawai, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $statuspegawai = StatusPegawai::find($id);
        return view('statuspegawai.edit', compact('statuspegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $statuspegawai = StatusPegawai::find($id);
        $statuspegawai->statusPegawai = $request->statusPegawai;
        $statuspegawai->save();

        return redirect('/statuspegawai');
    }

    public function updateapi(Request $request, string $id)
    {
        $statuspegawai = StatusPegawai::find($id);
        
        if (!$statuspegawai) {
            return response()->json(['message' => 'Status pegawai not found'], 404);
        }

        $statuspegawai->statusPegawai = $request->statusPegawai;
        $statuspegawai->save();

        return response()->json($statuspegawai, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $statuspegawai = StatusPegawai::find($id);
        $statuspegawai->delete();

        return redirect('/statuspegawai');
    }

    public function destroyapi(string $id)
    {
        $statuspegawai = StatusPegawai::find($id);

        if (!$statuspegawai) {
            return response()->json(['message' => 'Status pegawai not found'], 404);
        }

        $statuspegawai->delete();

        return response()->json(['message' => 'Status pegawai deleted successfully'], 200);
    }
}