@extends('masyarakat.layout.app')

@section('title', 'Status Pengaduan')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-16 space-y-12">

    {{-- Header --}}
    <div class="space-y-3">
        <h1 class="text-3xl font-semibold text-gray-900">
            Status Pengaduan
        </h1>

        <p class="text-gray-600 max-w-3xl">
            Di halaman ini Anda dapat memantau perkembangan setiap pengaduan
            yang telah dikirim. Status akan diperbarui secara berkala oleh petugas
            sesuai dengan kondisi di lapangan.
        </p>
    </div>

    {{-- Info Status --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
        <div class="border border-gray-200 p-4 bg-gray-50">
            <p class="font-medium text-gray-800">Dikirim</p>
            <p class="text-gray-600 mt-1">
                Pengaduan berhasil dikirim dan menunggu verifikasi.
            </p>
        </div>

        <div class="border border-gray-200 p-4 bg-gray-50">
            <p class="font-medium text-gray-800">Diproses</p>
            <p class="text-gray-600 mt-1">
                Pengaduan sedang ditangani oleh petugas terkait.
            </p>
        </div>

        <div class="border border-gray-200 p-4 bg-gray-50">
            <p class="font-medium text-gray-800">Selesai</p>
            <p class="text-gray-600 mt-1">
                Pengaduan telah ditindaklanjuti dan diselesaikan.
            </p>
        </div>
    </div>

    {{-- List Pengaduan --}}
    <div class="space-y-4">

        @forelse ($pengaduans as $pengaduan)
        <div class="border border-gray-200 bg-white px-6 py-5
                    flex flex-col md:flex-row md:items-center md:justify-between gap-6">

            {{-- LEFT --}}
            <div class="space-y-2">
                <p class="font-semibold text-gray-900">
                    {{ $pengaduan->judul }}
                </p>

                <p class="text-sm text-gray-500">
                    Dikirim pada {{ $pengaduan->created_at->format('d F Y') }}
                </p>

                {{-- Lokasi --}}
                <p class="text-sm text-gray-600 leading-relaxed">
                    {{ $pengaduan->alamat }}<br>
                    {{ $pengaduan->desa }}, {{ $pengaduan->kecamatan }}<br>
                    {{ $pengaduan->kabupaten }}, {{ $pengaduan->provinsi }}
                </p>
            </div>

            {{-- RIGHT STATUS --}}
            <div class="flex items-center">

                @php
                    $status = $pengaduan->status ?? 'Dikirim';
                @endphp

                @if ($status === 'Selesai')
                    <span class="px-4 py-1.5 text-sm
                                 bg-green-100 text-green-700">
                        Selesai
                    </span>
                @elseif ($status === 'Diproses')
                    <span class="px-4 py-1.5 text-sm
                                 bg-orange-100 text-orange-700">
                        Diproses
                    </span>
                @else
                    <span class="px-4 py-1.5 text-sm
                                 bg-gray-100 text-gray-600">
                        Dikirim
                    </span>
                @endif

            </div>
        </div>
        @empty
        <div class="border border-dashed border-gray-300 p-10 text-center">
            <p class="text-gray-600">
                Belum ada pengaduan yang dikirim.
            </p>
        </div>
        @endforelse

    </div>

</div>
@endsection
