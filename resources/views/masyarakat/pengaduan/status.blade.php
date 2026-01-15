@extends('masyarakat.layout.app')

@section('title', 'Status Pengaduan')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-16 space-y-12">

    {{-- Header --}}
    <div class="space-y-3 text-center md:text-left">
        <h1 class="text-3xl font-semibold text-gray-900">
            Status Pengaduan Anda
        </h1>
        <p class="text-gray-600 max-w-3xl">
            Halaman ini menampilkan semua pengaduan yang telah Anda kirim.
            Status pengaduan akan diperbarui secara otomatis oleh petugas.
            Gunakan halaman ini untuk memantau proses dari awal hingga selesai.
        </p>
    </div>

    {{-- Legend / Info Status --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
        <div class="border border-gray-200 p-4 bg-gray-50 rounded-lg">
            <p class="font-medium text-gray-800">Menunggu</p>
            <p class="text-gray-600 mt-1">
                Pengaduan berhasil dikirim dan menunggu verifikasi petugas.
            </p>
        </div>
        <div class="border border-gray-200 p-4 bg-gray-50 rounded-lg">
            <p class="font-medium text-gray-800">Diproses</p>
            <p class="text-gray-600 mt-1">
                Pengaduan sedang ditangani oleh petugas terkait.
            </p>
        </div>
        <div class="border border-gray-200 p-4 bg-gray-50 rounded-lg">
            <p class="font-medium text-gray-800">Selesai</p>
            <p class="text-gray-600 mt-1">
                Pengaduan telah ditindaklanjuti dan selesai ditangani.
            </p>
        </div>
    </div>

    {{-- List Pengaduan Dinamis --}}
    <div class="space-y-6">
        @forelse ($pengaduans as $pengaduan)
            @php
                $status = strtolower($pengaduan->status ?? 'menunggu');

                $statusTextClasses = match ($status) {
                    'selesai' => 'text-green-600',
                    'diproses' => 'text-yellow-600',
                    default => 'text-gray-500',
                };
            @endphp

            <div class="border border-gray-200 bg-white px-6 py-5 flex flex-col md:flex-row md:items-center md:justify-between gap-6 rounded-lg shadow-sm hover:shadow-md transition">

                {{-- LEFT: Info --}}
                <div class="space-y-2 flex-1">
                    <a href="{{ route('masyarakat.pengaduan.show', $pengaduan->id) }}"
                        class="font-semibold text-gray-900 hover:text-blue-600 hover:underline text-lg transition">
                        {{ $pengaduan->judul }}
                    </a>
                    <p class="text-sm text-gray-500">
                        Dikirim pada {{ $pengaduan->created_at->format('d F Y') }}
                    </p>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        {{ $pengaduan->alamat }}<br>
                        {{ $pengaduan->desa }}, {{ $pengaduan->kecamatan }}<br>
                        {{ $pengaduan->kabupaten }}, {{ $pengaduan->provinsi }}
                    </p>
                </div>

                {{-- RIGHT: Status + Thumbnail --}}
                <div class="flex flex-col md:flex-row md:items-center md:justify-end gap-4">
                    <span class="px-4 py-1.5 text-sm font-semibold rounded-full {{ $statusTextClasses }}">
                        {{ ucfirst($status) }}
                    </span>

                    {{-- Thumbnail --}}
                    <div class="w-full md:w-32 h-24 overflow-hidden rounded-lg border cursor-pointer"
                        onclick="openImageModal('{{ $pengaduan->foto ? asset('storage/'.$pengaduan->foto) : 'https://via.placeholder.com/800x400?text=No+Image' }}')">
                        <img src="{{ $pengaduan->foto ? asset('storage/'.$pengaduan->foto) : 'https://via.placeholder.com/150x100?text=No+Image' }}"
                             alt="Foto Pengaduan"
                             class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    </div>
                </div>
            </div>
        @empty
            <div class="border border-dashed border-gray-300 p-10 text-center rounded-lg">
                <p class="text-gray-600">
                    @if (!Auth::check())
                        Silakan login untuk melihat status pengaduan Anda.
                    @else
                        Belum ada pengaduan yang dikirim.
                    @endif
                </p>
            </div>
        @endforelse
    </div>
</div>

{{-- Modal Image Centered --}}
<div id="imageModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70 backdrop-blur-sm p-4">
    <div class="relative w-full max-w-3xl mx-auto">
        <button onclick="closeImageModal()"
            class="absolute top-2 right-2 text-white text-3xl font-bold hover:text-gray-200 transition z-50">✕</button>
        <img id="modalImage" src="" alt="Foto Pengaduan"
             class="w-full h-auto rounded-xl shadow-lg transform transition duration-300 scale-95 opacity-0">
    </div>
</div>

<script>
    // Buka modal gambar
    function openImageModal(src) {
        const modal = document.getElementById('imageModal');
        const img = document.getElementById('modalImage');
        img.src = src;
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');

        setTimeout(() => {
            img.classList.add('opacity-100', 'scale-100');
        }, 10);
    }

    // Tutup modal
    function closeImageModal() {
        const modal = document.getElementById('imageModal');
        const img = document.getElementById('modalImage');
        img.classList.remove('opacity-100', 'scale-100');
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }, 300);
    }

    // Tutup modal ketika klik backdrop
    document.getElementById('imageModal').addEventListener('click', function(e){
        if(e.target === this) closeImageModal();
    });

    // Tutup modal dengan ESC
    document.addEventListener('keydown', function(e){
        if(e.key === 'Escape') closeImageModal();
    });
</script>
@endsection
