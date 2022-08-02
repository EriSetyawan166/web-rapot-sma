<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = "guru";
    protected $primaryKey = "nip";
    protected $fillable = ['nip','nama','no_telp'];
    use HasFactory;

    public function gurudetail()
    {
        return $this->hasMany(GuruDetail::class,'guru_nip','nip');
    }

}
