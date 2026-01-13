@extends('admin.layout.app')

@section('title', 'Data Pengaduan')

@section('content')
<div class="px-4 py-10 max-w-7xl mx-auto space-y-6">

    <!-- Header + Filter -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 animate-fade-in">
        <div class="space-y-1">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                Data Pengaduan
            </h1>
            <p class="text-gray-500 text-sm">
                Kelola laporan pengaduan masyarakat secara cepat, mudah, dan transparan.
            </p>
        </div>

        <form method="GET" class="w-full md:w-auto animate-slide-in">
            <select name="status"
                    onchange="this.form.submit()"
                    class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-xl text-sm
                           focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-300">
                <option value="">Semua Status</option>
                <option value="diproses" {{ request('status')=='diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="selesai" {{ request('status')=='selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </form>
    </div>

    <!-- Penjelasan Tabel -->
    <p class="text-gray-500 text-sm animate-fade-in-up">
        Klik tombol <span class="font-semibold">"Lihat Detail"</span> untuk membuka informasi lengkap pengaduan. Gunakan filter untuk menampilkan status tertentu.
    </p>

    <!-- Tabel Pengaduan -->
    <div class="overflow-x-auto animate-fade-in-up delay-200">
        <table class="min-w-full text-sm divide-y bg-white rounded-xl shadow-sm">
            <thead class="bg-gray-100 text-gray-700 uppercase tracking-wider">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Pelapor</th>
                    <th class="px-4 py-3 text-left">Judul Pengaduan</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($pengaduans as $index => $pengaduan)
                <tr class="hover:bg-gray-50 transition duration-200">
                    <td class="px-4 py-3 text-gray-500">{{ $index + 1 }}</td>
                    <td class="px-4 py-3 font-medium text-gray-800">{{ $pengaduan->nama }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $pengaduan->judul }}</td>
                    <td class="px-4 py-3">
                        @if($pengaduan->status == 'selesai')
                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-600 text-xs font-semibold">Selesai</span>
                        @elseif($pengaduan->status == 'diproses')
                        <span class="px-3 py-1 rounded-full bg-orange-100 text-orange-600 text-xs font-semibold">Diproses</span>
                        @else
                        <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-600 text-xs font-semibold">Menunggu</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-center">
                        <a href="{{ route('admin.pengaduan.show', $pengaduan->id) }}"
                           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700 transition duration-300">
                           Lihat Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-8 text-gray-500">Belum ada pengaduan yang dikirim.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

<!-- Animations -->
<style>
@keyframes fadeIn { from { opacity:0 } to { opacity:1 } }
@keyframes fadeInUp { from { opacity:0; transform:translateY(10px) } to { opacity:1; transform:translateY(0) } }
@keyframes slideIn { from { opacity:0; transform:translateX(50px) } to { opacity:1; transform:translateX(0) } }

.animate-fade-in { animation: fadeIn 0.6s ease forwards; }
.animate-fade-in-up { animation: fadeInUp 0.6s ease forwards; }
.animate-slide-in { animation: slideIn 0.5s ease forwards; }

.animate-fade-in.delay-200 { animation-delay: 0.2s; }
.animate-fade-in-up.delay-200 { animation-delay: 0.2s; }
</style>
@endsection
