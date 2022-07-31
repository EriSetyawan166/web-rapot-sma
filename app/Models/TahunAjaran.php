<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $table = "tahun_ajaran";
    protected $primaryKey = "id";
    protected $fillable = ['id','tahun'];
    use HasFactory;

    public function nilai()
    {
        return $this->hasMany(Nilai::class,'kode_matpel','kode');
    }
}
