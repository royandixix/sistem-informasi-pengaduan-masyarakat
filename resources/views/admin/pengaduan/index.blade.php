@extends('admin.layout.app')

@section('title', 'Data Pengaduan')

@section('content')
<div class="px-4 py-10 max-w-7xl mx-auto space-y-6">

    <!-- Header + Filter -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 animate-fade-in-down">
        <div class="space-y-1">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                Data Pengaduan
            </h1>
            <p class="text-gray-500 text-sm">
                Kelola laporan pengaduan masyarakat secara cepat, mudah, dan transparan.
            </p>
        </div>

        <!-- Filter Status -->
        <form method="GET" class="w-full md:w-auto">
            <select name="status" onchange="this.form.submit()"
                    class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-xl text-sm bg-white shadow-sm focus:ring-2 focus:ring-blue-300 transition duration-200 hover:ring-blue-200">
                <option value="">Semua Status</option>
                <option value="menunggu" {{ request('status')=='menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="diproses" {{ request('status')=='diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="selesai" {{ request('status')=='selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </form>
    </div>

    <!-- Tabel Pengaduan -->
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm divide-y bg-white rounded-xl shadow-sm">
            <thead class="bg-gray-100 text-gray-700 uppercase tracking-wider">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Pelapor</th>
                    <th class="px-4 py-3 text-left">Judul Pengaduan</th>
                    <th class="px-4 py-3 text-left">Alamat</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengaduans as $index => $pengaduan)
                @php
                    $detail = $pengaduan->details->first();
                @endphp
                <tr class="animate-fade-in-up delay-{{ $index * 100 }} hover:bg-gray-50 transition duration-300">
                    <td class="px-4 py-3 text-gray-500">{{ $index + 1 }}</td>
                    <td class="px-4 py-3 font-medium text-gray-800">{{ $pengaduan->user->name ?? '-' }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $pengaduan->judul }}</td>
                    <td class="px-4 py-3 text-gray-600">
                        @if($detail)
                            {{ $detail->alamat }}, {{ $detail->desa }}, {{ $detail->kecamatan }}, {{ $detail->kabupaten }}, {{ $detail->provinsi }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        @if($pengaduan->status == 'selesai')
                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold animate-pulse">Selesai</span>
                        @elseif($pengaduan->status == 'diproses')
                        <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold animate-pulse">Diproses</span>
                        @else
                        <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-600 text-xs font-semibold animate-pulse">Menunggu</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-center">
                        <a href="{{ route('admin.pengaduan.show', $pengaduan->id) }}"
                           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700 hover:scale-105 transition duration-300">
                           Lihat Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-8 text-gray-500">Belum ada pengaduan yang dikirim.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

<!-- Animations -->
<style>
/* Fade in header */
.animate-fade-in-down { 
    animation: fadeInDown 0.6s ease forwards; 
}
/* Fade in table rows */
.animate-fade-in-up { 
    opacity: 0; 
    transform: translateY(10px); 
    animation: fadeInUp 0.6s forwards; 
}
@keyframes fadeInDown { 
    from { opacity:0; transform:translateY(-10px); } 
    to { opacity:1; transform:translateY(0); } 
}
@keyframes fadeInUp { 
    to { opacity:1; transform:translateY(0); } 
}
/* Pulse badge */
.animate-pulse { 
    animation: pulse 2s infinite; 
}
@keyframes pulse { 
    0%, 100% { transform: scale(1); opacity: 1; } 
    50% { transform: scale(1.05); opacity: 0.8; } 
}
</style>
@endsection
