<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    // Halaman utama masyarakat
    public function index()
{
    // Batasi 10 pengaduan terbaru
    $pengaduans = Pengaduan::latest()->take(10)->get();

    return view('masyarakat.index', compact('pengaduans'));
}


    // Form pengaduan
    public function create()
    {
        return view('masyarakat.pengaduan.create');
    }

    // Simpan pengaduan (wajib login)
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('masyarakat.index')
                ->with('error', 'Silakan login untuk mengirim pengaduan.');
        }

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'alamat' => 'required|string|max:255',
            'desa' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pengaduan', 'public');
        }

        $user = Auth::user();
        $validated['user_id'] = $user->id;
        $validated['nama'] = $user->name;
        $validated['kontak'] = $user->email;
        $validated['status'] = 'menunggu';

        Pengaduan::create($validated);

        return redirect()->route('masyarakat.pengaduan.status')
            ->with('success', 'Pengaduan berhasil dikirim.');
    }

    // Status pengaduan milik user login
    public function status()
    {
        if (!Auth::check()) {
            $pengaduans = collect();
        } else {
            $pengaduans = Pengaduan::where('user_id', Auth::id())
                ->latest()
                ->get();
        }

        return view('masyarakat.pengaduan.status', compact('pengaduans'));
    }

    // Detail pengaduan milik user login
    public function show($id)
    {
        $pengaduan = Pengaduan::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('masyarakat.pengaduan.show', compact('pengaduan'));
    }
}
