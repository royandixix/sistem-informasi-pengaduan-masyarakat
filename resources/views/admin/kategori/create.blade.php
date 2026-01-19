@extends('admin.layout.app')

@section('title', 'Tambah Kategori Pengaduan')

@section('content')
<div class="px-4 py-10 max-w-3xl mx-auto animate-fade-in">

    <!-- Card Form -->
    <div class="">
        <!-- Judul dan deskripsi halaman -->
        <div class="space-y-1">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                Tambah Kategori Pengaduan
            </h1>
            <p class="text-gray-500 text-sm">
                Isi nama, deskripsi, dan status kategori agar bisa digunakan di pengaduan masyarakat.
            </p>
        </div>

        <!-- Form tambah kategori -->
        <form action="{{ route('admin.kategori.store') }}" method="POST" class="space-y-6 mt-6">
            @csrf

            <!-- Nama Kategori -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">Nama Kategori</label>
                <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Contoh: Jalan & Infrastruktur"
                       class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-400 transition duration-300 transform hover:scale-[1.02]"
                       required>
                @error('nama')
                    <p class="text-red-500 text-sm mt-1 animate-fade-in-up">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">Deskripsi</label>
                <textarea name="deskripsi" rows="4" placeholder="Contoh: Keluhan terkait jalan, lampu, dan fasilitas umum"
                          class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-400 transition duration-300 transform hover:scale-[1.02]">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1 animate-fade-in-up">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">Status</label>
                <select name="status"
                        class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-400 transition duration-300 transform hover:scale-[1.02]"
                        required>
                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1 animate-fade-in-up">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Submit & Batal -->
            <div class="flex space-x-3">
                <button type="submit"
                        class="flex items-center gap-2 px-6 py-2 rounded-xl bg-blue-600 text-white font-medium hover:bg-blue-700 transform hover:scale-105 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Kategori
                </button>
                <a href="{{ route('admin.kategori.index') }}"
                   class="flex items-center gap-2 px-6 py-2 rounded-xl bg-gray-200 text-gray-800 hover:bg-gray-300 transform hover:scale-105 transition duration-300">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                   </svg>
                   Batal
                </a>
            </div>
        </form>
    </div>

</div>

<!-- Animations -->
<style>
.animate-fade-in { animation: fadeIn 0.6s ease forwards; }
.animate-fade-in-up { animation: fadeInUp 0.6s ease forwards; }
@keyframes fadeIn { from { opacity:0 } to { opacity:1 } }
@keyframes fadeInUp { from { opacity:0; transform:translateY(10px) } to { opacity:1; transform:translateY(0) } }
</style>
@endsection
