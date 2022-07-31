<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Matpel;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use function GuzzleHttp\Promise\all;

class RaporController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_matpel = Matpel::all();
        $data_nilai = Nilai::all();
        $data_tahun = TahunAjaran::all();
        $data_siswa = Siswa::all();
        return view('admin.rapor', compact('data_nilai', 'data_matpel', 'data_siswa','data_tahun'));
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
        $nilai = new Nilai();

        // $data_nilai = Nilai::where([['nisn_siswa', $request->nisn], ['kode_matpel', $request->kode_matpel],])->first();
        // if ($data_nilai) {
        //     return back()->with('info', 'Duplikat data (Data sudah terdaftar di dalam sistem)');
        // }
        $nilai->nisn_siswa = $request->nisn_siswa;
        $nilai->kode_matpel = $request->kode_matpel;
        $nilai->nilai = $request->nilai;
        $nilai->ket = $request->ket;
        $nilai->tahun_ajaran_id = $request->tahun;
        $nilai->semester = $request->sem;
        

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
        $nilai->save();
        return back()->with('success', 'Data Berhasil ditambah');
        // return Redirect::to(url()->previous());

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
        $sw = Siswa::findorfail($id);
        return view('rapor-siswa', compact('sw'));
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
    public function destroy($id)
    {
        //
    }

    public function input(Request $request)
    {
        // request()->fullUrlWithQuery(['nisn' => null]);
        // @dd($request->all());    
        $data_siswa = Siswa::where('nisn', $request->nisn)->first();
        $data_matpel = Matpel::all();
        $data_tahun = TahunAjaran::where('id',$request->tahun)->first();
        // @dd($data_tahun);
        $data_sem = $request->sem;
        $data_nilai = Nilai::where('nisn_siswa', $request->nisn)->where('tahun_ajaran_id',$request->tahun)->where('semester', $request->sem)->get();
        // @dd($data_nilai);
        // @dd($data_matpel);
        
        return view('admin.input-nilai',compact('data_siswa','data_matpel','data_nilai', 'data_tahun', 'data_sem'));
    }

    public function hapus(Request $request)
    {
        @dd($request->all());
    }
}
