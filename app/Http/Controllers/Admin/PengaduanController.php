<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::latest()->get();
        return view('admin.pengaduan.index', compact('pengaduans'));
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai'
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update([
            'status' => $request->status
        ]);

        return redirect()
            ->route('admin.pengaduan.show', $id)
            ->with('success', 'Status pengaduan berhasil diperbarui');
    }
}
