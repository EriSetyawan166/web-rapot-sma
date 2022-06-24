<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
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
        // @dd(Hash::make($request->password));
        // @dd($request->username, $request->password);
        $ceklogin = $request->only('username', 'password');
        // @dd($username, $password);
            if (Auth::attempt($ceklogin)){
                $request->session()->regenerate();
                return redirect()->intended('admin\dashboard');
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
