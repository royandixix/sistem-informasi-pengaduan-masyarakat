<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengaduan::with(['user', 'details']); // eager load user & details

        // filter status jika ada
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $pengaduans = $query->latest()->get();

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
