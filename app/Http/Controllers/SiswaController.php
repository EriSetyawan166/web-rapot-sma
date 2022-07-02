<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::where('nisn','=',Auth::user()->nisn_siswa)->firstOrFail();
        $data_siswa = User::paginate(6);


        return view('admin.siswa',compact('siswa', 'data_siswa'));
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

        $siswa = new Siswa();
        $user = new User();
        $data_siswa = Siswa::where('nisn', '=', $request->nisn)->first();
        if ($data_siswa) {
            return back()->with('info', 'Duplikat data (Data NISN sudah terdaftar di dalam sistem)');
        }

        $siswa->nisn = $request->nisn;
        $siswa->nama = $request->nama;
        $siswa->alamat = $request->alamat;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->nisn_siswa = $request->nisn;


        $siswa->save();
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
        $siswa = Siswa::findorfail($id);
        $pass = bcrypt($request->password);
        $user = User::where('nisn_siswa', '=', $id)->update(array('username' => $request->username, 'password' => $pass));

        $siswa->update($request->all());
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
        // @dd($id);
        $siswa = Siswa::where('nisn','=',$id)->firstOrFail();
        $siswa->delete();
        return back()->with('info', 'Data Berhasil Dihapus');
    }
}
