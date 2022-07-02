<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LihatRaporController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('nisn','=',Auth::user()->nisn_siswa)->firstOrFail();
        $data_nilai = Nilai::all()->where('nisn_siswa', '=' ,Auth::user()->nisn_siswa);
        return view('user.rapor', compact('siswa', 'data_nilai'));
    }
}
