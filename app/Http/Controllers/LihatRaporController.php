<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\Matpel;
use App\Models\TahunAjaran;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LihatRaporController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('nisn','=',Auth::user()->nisn_siswa)->firstOrFail();
        $data_tahun = TahunAjaran::all();
        return view('user.lihat-rapor', compact('siswa', 'data_tahun'));
    }

    public function rapor(Request $request)
    {
        // @dd($request->all());
        $data_tahun = TahunAjaran::where('id',$request->tahun)->first();
        $data_sem = $request->sem;
        $kelompok_A = Matpel::where('kelompok','Kelompok A ( Umum )')->get();
        $kelompok_B = Matpel::where('kelompok','Kelompok B ( Umum )')->get();
        $kelompok_C = Matpel::where('Kelompok', 'Kelompok C ( Peminatan )')->get();
        // @dd($kelompok_C);
        // @dd($request);
        $siswa = Siswa::where('nisn','=',Auth::user()->nisn_siswa)->firstOrFail();
        $data_siswa = Siswa::where('nisn','=',Auth::user()->nisn_siswa)->firstOrFail();
        $data_nilai = Nilai::all()->where('nisn_siswa', '=' ,Auth::user()->nisn_siswa)->where('tahun_ajaran_id',$request->tahun)->where('semester', $request->sem);
        $data_matpel = Matpel::all();

        return view('user.rapor', compact('siswa', 'data_siswa', 'data_matpel', 'data_nilai','data_tahun','data_sem','kelompok_A','kelompok_B','kelompok_C'));
    }
}
