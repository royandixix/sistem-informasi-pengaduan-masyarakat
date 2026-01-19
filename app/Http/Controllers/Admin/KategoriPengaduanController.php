<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriPengaduan;

class KategoriPengaduanController extends Controller
{
    /**
     * Menampilkan daftar semua kategori pengaduan
     */
    public function index()
    {
        // Ambil semua kategori terbaru
        $kategoris = KategoriPengaduan::latest()->get();
        return view('admin.kategori.index', compact('kategoris'));
    }

    /**
     * Form untuk tambah kategori
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Simpan kategori baru ke database
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        // Simpan kategori
        KategoriPengaduan::create($request->only(['nama','deskripsi','status']));

        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Form untuk edit kategori
     */
    public function edit($id)
    {
        $kategori = KategoriPengaduan::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update kategori yang sudah ada
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $kategori = KategoriPengaduan::findOrFail($id);

        // Update data
        $kategori->update($request->only(['nama','deskripsi','status']));

        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Hapus kategori
     */
    public function destroy($id)
    {
        KategoriPengaduan::destroy($id);

        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori berhasil dihapus');
    }
}
