<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPegawai;

class JenisPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenispegawai = JenisPegawai::all();
        return view('jenispegawai.index', compact('jenispegawai'));
    }

    public function indexapi()
    {
        $jenispegawai = JenisPegawai::all();
        return response()->json($jenispegawai, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenispegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jenispegawai = new JenisPegawai;
        $jenispegawai->nama_jenisPegawai = $request->nama_jenisPegawai;
        $jenispegawai->save();

        return redirect('/jenispegawai');
    }

    public function storeapi(Request $request)
    {
        $jenispegawai = new JenisPegawai;
        $jenispegawai->nama_jenisPegawai = $request->nama_jenisPegawai;
        $jenispegawai->save();
        return response()->json($jenispegawai, 201);
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
        $jenispegawai = JenisPegawai::findOrFail($id);
        return response()->json($jenispegawai, 200);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenispegawai = JenisPegawai::find($id);
        return view('jenispegawai.edit', compact('jenispegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jenispegawai = JenisPegawai::find($id);
        $jenispegawai->nama_jenisPegawai = $request->nama_jenisPegawai;
        $jenispegawai->save();

        return redirect('/jenispegawai');
    }

    public function updateapi(Request $request, string $id)
    {
        $jenispegawai = JenisPegawai::find($id);
        
        if (!$jenispegawai) {
            return response()->json(['message' => 'Jenis pegawai not found'], 404);
        }

        $jenispegawai->nama_jenisPegawai = $request->nama_jenisPegawai;
        $jenispegawai->save();

        return response()->json($jenispegawai, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenispegawai = JenisPegawai::find($id);
        $jenispegawai->delete();

        return redirect('/jenispegawai');
    }

    public function destroyapi(string $id)
    {
        $jenispegawai = JenisPegawai::find($id);

        if (!$jenispegawai) {
            return response()->json(['message' => 'Jenis pegawai not found'], 404);
        }

        $jenispegawai->delete();

        return response()->json(['message' => 'Jenis pegawai deleted successfully'], 200);
    }
}