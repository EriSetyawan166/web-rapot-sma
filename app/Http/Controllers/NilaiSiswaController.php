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
        $data_nilai = Nilai::all()->where('kode_matpel', '=', $id);
        $data_matpel = Matpel::where('kode', '=', $id)->firstOrFail();
        $siswa = Siswa::where('nis','=',Auth::user()->nis_siswa)->firstOrFail();
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_matpel, $id_siswa)
    {
        $nilai = Nilai::where('kode_matpel','=',$id_matpel)->where('nis_siswa', '=', $id_siswa)->delete();
        return back()->with('info', 'Data Berhasil Dihapus');
    }
}
