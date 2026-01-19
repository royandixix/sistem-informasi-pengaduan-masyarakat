<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wilayah;

class WilayahController extends Controller
{
    // Menampilkan semua wilayah
    public function index()
    {
        $wilayahs = Wilayah::latest()->get();
        return view('admin.wilayah.index', compact('wilayahs'));
    }

    // Form tambah wilayah
    public function create()
    {
        return view('admin.wilayah.create');
    }

    // Simpan wilayah baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|string|max:255', // validasi tipe
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif'
        ]);

        Wilayah::create([
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.wilayah.index')
            ->with('success', 'Wilayah berhasil ditambahkan.');
    }

    // Form edit wilayah
    public function edit($id)
    {
        $wilayah = Wilayah::findOrFail($id);
        return view('admin.wilayah.edit', compact('wilayah'));
    }

    // Update wilayah
    public function update(Request $request, $id)
    {
        $wilayah = Wilayah::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|string|max:255', // validasi tipe
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif'
        ]);

        $wilayah->update([
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.wilayah.index')
            ->with('success', 'Wilayah berhasil diperbarui.');
    }

    // Hapus wilayah
    public function destroy($id)
    {
        $wilayah = Wilayah::findOrFail($id);
        $wilayah->delete();

        return redirect()->route('admin.wilayah.index')
            ->with('success', 'Wilayah berhasil dihapus.');
    }
}
