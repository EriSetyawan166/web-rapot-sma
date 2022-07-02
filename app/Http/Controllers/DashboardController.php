<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Models\Matpel;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('nisn','=',Auth::user()->nisn_siswa)->firstOrFail();
        $total_siswa = Siswa::count()-1;
        $total_matpel = Matpel::count();

        return view('admin\dashboard', compact('siswa', 'total_siswa', 'total_matpel'));
    }
}
