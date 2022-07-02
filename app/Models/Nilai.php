<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = "nilai";
    protected $primaryKey = ["nisn_siswa", "kode_matkul"];
    protected $fillable = ['nisn_siswa','kode_matkul','nilai', 'predikat', 'ket'];
    public $incrementing = false;
    use HasFactory;

    public function matpel()
    {
        return $this->belongsTo(Matpel::class, 'kode_matpel','kode');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn_siswa','nisn');
    }
}
