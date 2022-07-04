<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matpel extends Model
{
    protected $table = "matpel";
    protected $primaryKey = "kode";
    protected $fillable = ['kode','nama','kkm', 'kelompok'];
    public $incrementing = false;
    use HasFactory;

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

}
