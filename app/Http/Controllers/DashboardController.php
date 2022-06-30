<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('nis','=',Auth::user()->nis_siswa)->firstOrFail();
        $total_siswa = Siswa::count();

        return view('admin\dashboard', compact('siswa', 'total_siswa'));
    }
}
