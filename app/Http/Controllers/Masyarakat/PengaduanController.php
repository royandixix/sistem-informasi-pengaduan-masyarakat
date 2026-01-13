<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    /**
     * Halaman utama masyarakat: menampilkan semua pengaduan
     */
    public function index()
    {
        // Tampilkan semua pengaduan, urut terbaru
        $pengaduans = Pengaduan::latest()->get();

        return view('masyarakat.index', compact('pengaduans'));
    }

    /**
     * Form buat pengaduan baru
     */
    public function create()
    {
        return view('masyarakat.pengaduan.create');
    }

    /**
     * Simpan pengaduan baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kontak' => 'required|string|max:50',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'alamat' => 'required|string|max:255',
            'desa' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'foto' => 'nullable|image|max:2048',
        ]);

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pengaduan', 'public');
        }

        // Tidak pakai auth, jadi user_id nullable
        $validated['user_id'] = null;
        $validated['status'] = 'menunggu'; // status default

        Pengaduan::create($validated);

        return redirect()->route('masyarakat.index')
            ->with('success', 'Pengaduan berhasil dikirim.');
    }

    /**
     * Halaman untuk cek status pengaduan
     */
    public function status()
    {
        // Tampilkan semua pengaduan
        $pengaduans = Pengaduan::latest()->get();

        return view('masyarakat.pengaduan.status', compact('pengaduans'));
    }

    /**
     * Tampilkan detail pengaduan
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        return view('masyarakat.pengaduan.show', compact('pengaduan'));
    }
}
