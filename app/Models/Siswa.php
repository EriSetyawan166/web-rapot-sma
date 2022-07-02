<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = "siswa";
    protected $primaryKey = "nisn";
    public $incrementing = false;
    protected $fillable = ['nisn','nama','alamat'];
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class,'nisn_siswa', 'nisn');
    }
}
