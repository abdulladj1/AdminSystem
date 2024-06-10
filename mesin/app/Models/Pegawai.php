<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = "pegawai";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'nama', 'nik', 'jenispegawai', 'statuspegawai', 'unit', 'subUnit', 'pendidikan', 'tanggallahir', 'tempatlahir', 'jeniskelamin', 'agama', 'gambar'    ];

    use HasFactory;
    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id');
    }
    public function jenisKelamin()
    {
        return $this->belongsTo(JenisKelamin::class, 'jenis_kelamin_id');
    }
    public function jenisPegawai()
    {
        return $this->belongsTo(JenisPegawai::class, 'jenis_pegawai_id');
    }
    public function statusPegawai()
    {
        return $this->belongsTo(StatusPegawai::class, 'status_pegawai_id');
    }
    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan_id');
    }
    public function gambar()
    {
        return $this->belongsTo(Gambar::class, 'gambar');
    }
}
