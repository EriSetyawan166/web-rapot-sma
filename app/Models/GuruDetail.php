<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruDetail extends Model
{
    protected $table = "guru_detail";
    protected $primaryKey = "id";
    protected $fillable = ['id','guru_nip','matpel_id'];
    use HasFactory;

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_nip','nip');
    }

    public function matpel()
    {
        return $this->belongsTo(Matpel::class, 'matpel_id','kode');
    }
}
