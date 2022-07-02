<?php

namespace App\Http\Controllers;

use App\Models\Matpel;
use App\Models\Siswa;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NilaiSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->kode;
        $data_nilai = Nilai::where('kode_matpel', '=', $id)->paginate(5);
        $data_matpel = Matpel::where('kode', '=', $id)->firstOrFail();
        $siswa = Siswa::where('nisn','=',Auth::user()->nisn_siswa)->firstOrFail();
        return view('admin.nilai-siswa', compact('siswa', 'data_nilai', 'data_matpel'));
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
    public function update(Request $request, $id_matpel, $id_siswa)
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
        $nilai = Nilai::where('kode_matpel','=',$id_matpel)->where('nisn_siswa', '=', $id_siswa)->update(array('nilai' => $request->nilai, 'ket' => $request->ket, 'predikat' => $nilai->predikat));
        // $nilai = Nilai::findOrFail($id);
        return back()->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_matpel, $id_siswa)
    {
        $nilai = Nilai::where('kode_matpel','=',$id_matpel)->where('nisn_siswa', '=', $id_siswa)->delete();
        return back()->with('info', 'Data Berhasil Dihapus');
    }
}
