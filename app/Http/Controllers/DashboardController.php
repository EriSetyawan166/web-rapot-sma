<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // $user = Users::findOrFail(Auth::user()->id);
        $user = User::findOrFail(Auth::user()->id);
        // @dd($user);
        return view('admin\dashboard');
    }
}
