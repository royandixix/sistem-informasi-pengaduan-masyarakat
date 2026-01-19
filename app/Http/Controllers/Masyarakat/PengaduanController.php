<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;
use App\Models\PengaduanDetail;
use App\Models\KategoriPengaduan;
use App\Models\Wilayah;
use App\Models\Instansi;

class PengaduanController extends Controller
{

    public function index()
    {
        $pengaduans = Pengaduan::latest()->take(10)->get();
        return view('masyarakat.index', compact('pengaduans'));
    }

    public function create()
    {
        $kategoris = KategoriPengaduan::where('status', 'aktif')->get();
        $wilayahs  = Wilayah::where('status', 'aktif')->get();
        $instansis = Instansi::where('status', 'aktif')->get();

        return view('masyarakat.pengaduan.create', compact('kategoris', 'wilayahs', 'instansis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_pengaduan_id' => 'required|exists:kategori_pengaduans,id',
            'wilayah_id'            => 'required|exists:wilayahs,id',
            'instansi_id'           => 'required|exists:instansis,id',
            'judul'                 => 'required|string|max:255',
            'isi'                   => 'required|string',

            'alamat'     => 'required|string',
            'desa'       => 'required|string',
            'kecamatan'  => 'required|string',
            'kabupaten'  => 'required|string',
            'provinsi'   => 'required|string',

            'foto' => 'nullable|image|max:2048',
        ]);

        // Simpan master pengaduan
        $pengaduan = Pengaduan::create([
            'user_id'               => Auth::id(),
            'kategori_pengaduan_id' => $request->kategori_pengaduan_id,
            'wilayah_id'            => $request->wilayah_id,
            'instansi_id'           => $request->instansi_id,
            'judul'                 => $request->judul,
            'isi'                   => $request->isi,
            'foto'                  => $request->hasFile('foto')
                ? $request->file('foto')->store('pengaduan', 'public')
                : null,
            'status' => 'menunggu',
        ]);

        // Simpan detail lokasi
        $pengaduan->details()->create([
            'alamat'    => $request->alamat,
            'desa'      => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi'  => $request->provinsi,
            'status'    => 'aktif',
        ]);

        return redirect()->route('masyarakat.pengaduan.status')
            ->with('success', 'Pengaduan berhasil dikirim.');
    }

    /**
     * HALAMAN STATUS PENGADUAN USER
     */
    public function status()
    {
        $pengaduans = Pengaduan::with('details')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('masyarakat.pengaduan.status', compact('pengaduans'));
    }

    /**
     * DETAIL PENGADUAN
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::with(['kategori', 'wilayah', 'instansi', 'details'])
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('masyarakat.pengaduan.show', compact('pengaduan'));
    }
}
