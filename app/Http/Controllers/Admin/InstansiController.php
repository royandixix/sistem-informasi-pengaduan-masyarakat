<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instansi;

class InstansiController extends Controller
{
    // Menampilkan semua instansi
    public function index()
    {
        $instansis = Instansi::latest()->get();
        return view('admin.instansi.index', compact('instansis'));
    }

    // Form tambah instansi
    public function create()
    {
        return view('admin.instansi.create');
    }

    // Simpan instansi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif'
        ]);

        Instansi::create($request->all());

        return redirect()->route('admin.instansi.index')
            ->with('success', 'Instansi berhasil ditambahkan.');
    }

    // Form edit instansi
    public function edit($id)
    {
        $instansi = Instansi::findOrFail($id);
        return view('admin.instansi.edit', compact('instansi'));
    }

    // Update instansi
    public function update(Request $request, $id)
    {
        $instansi = Instansi::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif'
        ]);

        $instansi->update($request->all());

        return redirect()->route('admin.instansi.index')
            ->with('success', 'Instansi berhasil diperbarui.');
    }

    // Hapus instansi
    public function destroy($id)
    {
        $instansi = Instansi::findOrFail($id);
        $instansi->delete();

        return redirect()->route('admin.instansi.index')
            ->with('success', 'Instansi berhasil dihapus.');
    }
}
