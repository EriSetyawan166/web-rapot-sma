<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\User;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_guru = User::where('role_id','2')->paginate(6);
        // @dd($data_guru);
        $siswa = Siswa::where('nisn','=',Auth::user()->nisn_siswa)->firstOrFail();
        return view('admin.guru', compact('siswa','data_guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guru = new Guru();
        $user = new User();
        $data_guru = Guru::where('nip', '=', $request->nip)->first();
        if ($data_guru) {
            return back()->with('info', 'Duplikat data (Data NISN sudah terdaftar di dalam sistem)');
        }
        $guru->nip = $request->nip;
        $guru->nama = $request->nama;
        $user->username = $request->username;
        $guru->no_telp = $request->no_telp;
        $user->password = bcrypt($request->password);
        $user->role_id = "2";
        $user->nip_guru = $request->nip;


        $guru->save();
        $user->save();
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
        $guru = Guru::findorfail($id);
        $pass = bcrypt($request->password);
        $user = User::where('nisn_siswa', '=', $id)->update(array('username' => $request->username, 'password' => $pass));

        $guru->update($request->all());
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
        $guru = Guru::where('nip','=',$id)->firstOrFail();
        $guru->delete();
        return back()->with('info', 'Data Berhasil Dihapus');
    }
}
