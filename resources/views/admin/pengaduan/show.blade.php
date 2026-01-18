@extends('admin.layout.app')

@section('title', 'Detail Pengaduan')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-24">

    {{-- Background container --}}
    <div class=" p-6 sm:p-10 space-y-10">

        {{-- Header --}}
        <div>
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-800">
                Detail Pengaduan
            </h1>
            <p class="text-gray-500 mt-2">
                Informasi lengkap laporan masyarakat
            </p>
        </div>

        {{-- Informasi Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-gray-800">

            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">Nama Pelapor</p>
                <p class="font-semibold mt-1">{{ $pengaduan->nama }}</p>
            </div>

            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">Kontak</p>
                <p class="font-semibold mt-1">{{ $pengaduan->kontak }}</p>
            </div>

            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">Status</p>
                @php
                    $statusColor = match($pengaduan->status) {
                        'selesai' => 'green',
                        'diproses' => 'orange',
                        default => 'gray',
                    };
                @endphp
                <span class="inline-flex mt-1 px-3 py-1 rounded-full text-xs font-medium bg-{{ $statusColor }}-100 text-{{ $statusColor }}-600">
                    {{ ucfirst($pengaduan->status ?? 'Menunggu') }}
                </span>
            </div>

            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">Judul Pengaduan</p>
                <p class="font-semibold mt-1">{{ $pengaduan->judul }}</p>
            </div>

            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">Tanggal</p>
                <p class="font-semibold mt-1">{{ $pengaduan->created_at->format('d F Y') }}</p>
            </div>

        </div>

        {{-- Isi Laporan --}}
        <div>
            <p class="text-xs text-gray-500 uppercase tracking-wide mb-2">Isi Laporan</p>
            <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                {{ $pengaduan->isi }}
            </p>
        </div>

        {{-- Alamat --}}
        <div>
            <p class="text-xs text-gray-500 uppercase tracking-wide mb-2">Alamat Lengkap</p>
            <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                {{ $pengaduan->alamat }}, {{ $pengaduan->desa }}, {{ $pengaduan->kecamatan }}, {{ $pengaduan->kabupaten }}, {{ $pengaduan->provinsi }}
            </p>
        '</div>

        {{-- Foto Bukti --}}
        <div>
            <p class="text-xs text-gray-500 uppercase tracking-wide mb-3">Foto Bukti</p>
            <div class="overflow-hidden rounded-2xl">
                @if($pengaduan->foto)
                    <img src="{{ asset('storage/'.$pengaduan->foto) }}" 
                         alt="Foto Pengaduan"
                         class="w-full h-auto object-cover hover:scale-105 transition duration-500">
                @else
                    <img src="https://via.placeholder.com/800x400" 
                         alt="Foto Pengaduan"
                         class="w-full h-auto object-cover hover:scale-105 transition duration-500">
                @endif
            </div>
        </div>

        {{-- Update Status & Kembali --}}
        <div class="pt-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <form action="{{ route('admin.pengaduan.updateStatus', $pengaduan->id) }}" method="POST" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2">
                @csrf
                @method('PATCH')
                <select name="status"
                        class="px-4 py-2 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-200 focus:border-blue-500">
                    <option value="diproses" {{ $pengaduan->status=='diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ $pengaduan->status=='selesai' ? 'selected' : '' }}>Selesai</option>
                </select>

                <button type="submit"
                        class="px-5 py-2 rounded-xl bg-green-600 text-white text-sm hover:bg-green-700 transition">
                    Update Status
                </button>
            </form>

            <a href="{{ route('admin.pengaduan.index') }}"
               class="text-sm font-medium text-gray-500 hover:text-gray-700">
                ← Kembali ke daftar
            </a>
        </div>

    </div> {{-- End Background Container --}}
</div>
@endsection
