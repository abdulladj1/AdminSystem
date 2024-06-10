<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Agama;
use App\Models\Pegawai;
use App\Models\JenisPegawai;
use App\Models\JenisKelamin;
use App\Models\StatusPegawai;
use App\Models\Pendidikan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }

    public function indexapi()
    {
        $pegawai = Pegawai::all();
        return response()->json($pegawai, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agamas = Agama::all();
        $jenispegawai = JenisPegawai::all();
        $jeniskelamin = JenisKelamin::all();
        $statuspegawai = StatusPegawai::all();
        $pendidikan = Pendidikan::all();

        return view('pegawai.create', compact('agamas', 'jenispegawai', 'jeniskelamin', 'statuspegawai', 'pendidikan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required|integer',
            'jenis_pegawai_id' => 'required',
            'status_pegawai_id' => 'required',
            'unit' => 'required',
            'subUnit' => 'required',
            'pendidikan_id' => 'required',
            'tanggallahir' => 'required',
            'tempatlahir' => 'required',
            'jenis_kelamin_id' => 'required',
            'agama_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pegawai = new Pegawai;
        $pegawai->nama = $request->nama;
        $pegawai->nik = $request->nik;
        $pegawai->jenis_pegawai_id = $request->jenis_pegawai_id;
        $pegawai->status_pegawai_id = $request->status_pegawai_id;
        $pegawai->unit = $request->unit;
        $pegawai->subUnit = $request->subUnit;
        $pegawai->pendidikan_id = $request->pendidikan_id;
        $pegawai->tanggallahir = $request->tanggallahir;
        $pegawai->tempatlahir = $request->tempatlahir;
        $pegawai->jenis_kelamin_id = $request->jenis_kelamin_id;
        $pegawai->agama_id = $request->agama_id;
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('pegawai_images', 'public');
            $pegawai->gambar = $imagePath;
        }
        
        $pegawai->save();

        return redirect('data-pegawai');
    }

    public function storeapi(Request $request)
    {
        $pegawai = new Pegawai;
        $pegawai->nama = $request->nama;
        $pegawai->nik = $request->nik;
        $pegawai->jenis_pegawai_id = $request->jenis_pegawai_id;
        $pegawai->status_pegawai_id = $request->status_pegawai_id;
        $pegawai->unit = $request->unit;
        $pegawai->subUnit = $request->subUnit;
        $pegawai->pendidikan_id = $request->pendidikan_id;
        $pegawai->tanggallahir = $request->tanggallahir;
        $pegawai->tempatlahir = $request->tempatlahir;
        $pegawai->jenis_kelamin_id = $request->jenis_kelamin_id;
        $pegawai->agama_id = $request->agama_id;
        
        $pegawai->save();
        return response()->json($pegawai, 201);
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
        $pegawai = Pegawai::findOrFail($id);
        return response()->json($pegawai, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pegawai = Pegawai::find($id);
        $agamas = Agama::all();
        $jenispegawai = JenisPegawai::all();
        $jeniskelamin = JenisKelamin::all();
        $statuspegawai = StatusPegawai::all();
        $pendidikan = Pendidikan::all();
        return view('pegawai.edit', compact('pegawai', 'agamas', 'jenispegawai', 'jeniskelamin', 'statuspegawai', 'pendidikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required|integer',
            'jenis_pegawai_id' => 'required',
            'status_pegawai_id' => 'required',
            'unit' => 'required',
            'subUnit' => 'required',
            'pendidikan_id' => 'required',
            'tanggallahir' => 'required',
            'tempatlahir' => 'required',
            'jenis_kelamin_id' => 'required',
            'agama_id' => 'required', 
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pegawai = Pegawai::findOrFail($id);
        $pegawai->nama = $request->nama;
        $pegawai->nik = $request->nik;
        $pegawai->jenis_pegawai_id = $request->jenis_pegawai_id;
        $pegawai->status_pegawai_id = $request->status_pegawai_id;
        $pegawai->unit = $request->unit;
        $pegawai->subUnit = $request->subUnit;
        $pegawai->pendidikan_id = $request->pendidikan_id;
        $pegawai->tanggallahir = $request->tanggallahir;
        $pegawai->tempatlahir = $request->tempatlahir;
        $pegawai->jenis_kelamin_id = $request->jenis_kelamin_id;
        $pegawai->agama_id = $request->agama_id;
        if ($request->hasFile('gambar')) {
            if ($pegawai->gambar) {
                $gambarPath = 'public/' . $pegawai->gambar;
                if (Storage::exists($gambarPath)) {
                    Storage::delete($gambarPath);
                }
            }
            $imagePath = $request->file('gambar')->store('pegawai_images', 'public');
            $pegawai->gambar = $imagePath;
        }
        $pegawai->save();

        return redirect('/data-pegawai')->with('success', 'Data Pegawai berhasil diperbarui.');
    }

    public function updateapi(Request $request, string $id): JsonResponse
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required|integer',
            'jenis_pegawai_id' => 'required',
            'status_pegawai_id' => 'required',
            'unit' => 'required',
            'subUnit' => 'required',
            'pendidikan_id' => 'required',
            'tanggallahir' => 'required',
            'tempatlahir' => 'required',
            'jenis_kelamin_id' => 'required',
            'agama_id' => 'required', 
        ]);

        $pegawai = Pegawai::findOrFail($id);
        $pegawai->nama = $request->nama;
        $pegawai->nik = $request->nik;
        $pegawai->jenis_pegawai_id = $request->jenis_pegawai_id;
        $pegawai->status_pegawai_id = $request->status_pegawai_id;
        $pegawai->unit = $request->unit;
        $pegawai->subUnit = $request->subUnit;
        $pegawai->pendidikan_id = $request->pendidikan_id;
        $pegawai->tanggallahir = $request->tanggallahir;
        $pegawai->tempatlahir = $request->tempatlahir;
        $pegawai->jenis_kelamin_id = $request->jenis_kelamin_id;
        $pegawai->agama_id = $request->agama_id;
        
        $pegawai->save();

        return response()->json($pegawai, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect('/data-pegawai')->with('success', 'Data Pegawai berhasil dihapus.');
    }

    public function destroyapi(string $id): JsonResponse
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return response()->json(['message' => 'Data Pegawai berhasil dihapus.'], 200);
    }
}