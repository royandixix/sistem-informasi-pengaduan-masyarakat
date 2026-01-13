@extends('admin.layout.app')

@section('title', 'Detail Pengaduan')

@section('content')
<div class="max-w-5xl mx-auto space-y-8 px-2 sm:px-0">

    <div>
        <h1 class="text-2xl sm:text-3xl mt-20 font-bold text-gray-800">
            Detail Pengaduan
        </h1>
        <p class="text-sm text-gray-500 mt-1">
            Informasi lengkap laporan masyarakat
        </p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm p-5 sm:p-6 space-y-8 border border-gray-100">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">
                    Nama Pelapor
                </p>
                <p class="font-semibold text-gray-800 mt-1">
                    {{ $pengaduan->nama }}
                </p>
            </div>

            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">
                    Status
                </p>
                @if($pengaduan->status == 'selesai')
                    <span class="inline-flex mt-1 px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-600">
                        Selesai
                    </span>
                @elseif($pengaduan->status == 'diproses')
                    <span class="inline-flex mt-1 px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-600">
                        Diproses
                    </span>
                @else
                    <span class="inline-flex mt-1 px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                        Menunggu
                    </span>
                @endif
            </div>

            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">
                    Judul Pengaduan
                </p>
                <p class="font-semibold text-gray-800 mt-1">
                    {{ $pengaduan->judul }}
                </p>
            </div>

            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">
                    Tanggal
                </p>
                <p class="font-semibold text-gray-800 mt-1">
                    {{ $pengaduan->created_at->format('d F Y') }}
                </p>
            </div>
        </div>

        <div>
            <p class="text-xs text-gray-500 uppercase tracking-wide mb-2">
                Isi Laporan
            </p>
            <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                {{ $pengaduan->isi }}
            </p>
        </div>

        <div>
            <p class="text-xs text-gray-500 uppercase tracking-wide mb-3">
                Foto Bukti
            </p>
            <div class="overflow-hidden rounded-xl border">
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

        <div class="border-t pt-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <form action="{{ route('admin.pengaduan.update', $pengaduan->id) }}" method="POST" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2">
                @csrf
                @method('PATCH')
                <select name="status"
                        class="px-4 py-2 border border-gray-200 rounded-xl text-sm
                               focus:ring-2 focus:ring-blue-200 focus:border-blue-500">
                    <option value="diproses" {{ $pengaduan->status=='diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ $pengaduan->status=='selesai' ? 'selected' : '' }}>Selesai</option>
                </select>

                <button type="submit"
                        class="px-5 py-2 rounded-xl bg-green-600 text-white text-sm hover:bg-green-700 transition">
                    Update Status
                </button>
            </form>

            <a href="{{ url('/admin/pengaduan') }}"
               class="text-sm font-medium text-gray-500 hover:text-gray-700">
                ← Kembali ke daftar
            </a>
        </div>

    </div>
</div>
@endsection
