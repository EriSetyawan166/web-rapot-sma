<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = "siswa";
    protected $primarykey = "nis";
    protected $fillable = ['nis','nama','alamat'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
