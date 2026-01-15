<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Hitung data pengaduan
        $total = Pengaduan::count();
        $diproses = Pengaduan::where('status', 'diproses')->count();
        $selesai = Pengaduan::where('status', 'selesai')->count();

        $welcomeMessage = "Selamat datang, {$user->name}!";

        return view('admin.dashboard', compact(
            'welcomeMessage',
            'total',
            'diproses',
            'selesai'
        ));
    }
}
