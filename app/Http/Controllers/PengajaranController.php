<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\GuruDetail;
use App\Models\Matpel;
use Illuminate\Support\Facades\Auth;

class PengajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matpel = Matpel::all();
        $guru = Guru::all();
        $data_pengajaran = GuruDetail::paginate(5);
        $siswa = Siswa::where('nisn','=',Auth::user()->nisn_siswa)->firstOrFail();
        return view('admin.pengajaran', compact('siswa','guru','matpel','data_pengajaran'));
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
        // @dd($request->all());
        $guru_detail = GuruDetail::all();
        $data_matpel = GuruDetail::where('guru_nip',$request->guru)->where('matpel_id',$request->matpel)->first();
        if ($data_matpel) {
            return back()->with('info', 'Duplikat data (Data Pengajaran sudah terdaftar di dalam sistem)');
        }
        $data = new guruDetail();
        $data->guru_nip = $request->guru;
        $data->matpel_id = $request->matpel;
        $data->save();
        return back()->with('success', 'Data Berhasil ditambah');


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
    public function destroy($matpel_id, $nip)
    {
        // @dd($nip,$matpel_id);
        $guru_detail = GuruDetail::where('matpel_id',$matpel_id)->where('guru_nip',$nip)->firstOrFail();
        $guru_detail->delete();
        return back()->with('info', 'Data Berhasil Dihapus');
    }
}
