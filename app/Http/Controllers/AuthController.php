<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()){

            return redirect()->intended('admin\dashboard');
        }

        return view('login');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );
        $ceklogin = $request->only('username', 'password');
            if (Auth::attempt($ceklogin)){

                $session = User::all()->where('username', $request->username)->first();
                // @dd($session->role_id);

                $request->session()->regenerate();
                session([
                    'nama' => $session->username,
                    'id' => $session->id,
                    'role_user'=> $session->role_id,
                ]);
                

                if ($session->role_id == 1) {
                    return redirect()->intended('admin\dashboard');
                } else{
                    return redirect()->intended('user\dashboard');
                }

            }

        return redirect('login')
        ->withInput()
        ->withErrors(['login_gagal' => 'Username atau Password Salah']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }

    public function username()
    {
        return 'username';
    }
}
