<?php

namespace App\Http\Controllers;

use App\Models\Matpel;
use App\Models\Nilai;
use App\Models\TahunAjaran;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class RaporDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data_tahun = TahunAjaran::where('id',$request->tahun)->first();
        $data_sem = $request->sem;
        // @dd($request->all())
        $id = $request->id;
        // @dd($request);
        $siswa = Siswa::where('nisn','=',Auth::user()->nisn_siswa)->firstOrFail();
        $data_siswa = Siswa::where('nisn','=',$id)->firstOrFail();
        $data_nilai = Nilai::all()->where('nisn_siswa', '=' ,$id)->where('tahun_ajaran_id',$request->tahun)->where('semester', $request->sem);
        $data_matpel = Matpel::all();

        return view('admin.rapor-siswa', compact('siswa', 'data_siswa', 'data_matpel', 'data_nilai','data_tahun','data_sem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_matpel, $id_siswa, $id_tahun, $id_sem)
    {
        $nilai = new Nilai();
        $nilai->nilai = $request->nilai;
        switch ($nilai->nilai) {
            case $nilai->nilai >= 93 && $nilai->nilai <=100:
                $hasil = "A";
                break;

            case $nilai->nilai >= 85 && $nilai->nilai <93:
                $hasil = "B";
                break;

            case $nilai->nilai >= 77 && $nilai->nilai <85:
                $hasil = "C";
                break;

            default:
                $hasil = "D";
                break;
        }
        $nilai->predikat = $hasil;
        $nilai = Nilai::where('kode_matpel','=',$id_matpel)->where('nisn_siswa', '=', $id_siswa)->where('tahun_ajaran_id',$id_tahun)->where('semester', $id_sem)->update(array('nilai' => $request->nilai, 'ket' => $request->ket, 'predikat' => $nilai->predikat));
        // $nilai = Nilai::findOrFail($id);
        return back()->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_matpel, $id_siswa,$id_tahun,$id_sem)
    {

        // @dd('test');
        // $test = Nilai::where('kode_matpel','=',$id_matpel)->where('nisn_siswa', '=', $id_siswa)->where('tahun_ajaran_id',$id_tahun)->where('semester', $id_sem)->first();
        // @dd($test);
        $nilai = Nilai::where('kode_matpel','=',$id_matpel)->where('nisn_siswa', '=', $id_siswa)->where('tahun_ajaran_id',$id_tahun)->where('semester', $id_sem)->delete();
        return back()->with('info', 'Data Berhasil Dihapus');
    }
}
