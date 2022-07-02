<?php

namespace App\Http\Controllers;

use App\Models\KelompokMatpel;
use App\Models\Matpel;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matpel = Matpel::paginate(5);
        return view('admin.matpel', compact('matpel'));
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
        $matpel = new Matpel();
        $data_matpel = Matpel::where('kode', '=', $request->kode)->first();
        if ($data_matpel) {
            return back()->with('info', 'Duplikat data (Data kode Mata sudah terdaftar di dalam sistem)');
        }
        $matpel->kode = $request->kode;
        $matpel->nama = $request->nama;
        $matpel->kkm = $request->kkm;
        $matpel->kelompok = $request->kelompok;
        $matpel->save();
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
        $matpel = Matpel::findorfail($id);
        $matpel->update($request->all());
        return back()->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matpel = Matpel::where('kode','=',$id)->firstOrFail();
        $matpel->delete();
        return back()->with('info', 'Data Berhasil Dihapus');
    }
}
