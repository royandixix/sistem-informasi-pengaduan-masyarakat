@extends('admin.layout.app')

@section('title', 'Data Kategori Pengaduan')

@section('content')
<div class="px-4 py-10 max-w-7xl mx-auto space-y-6">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 animate-fade-in">
        <div class="space-y-1">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                Data Kategori Pengaduan
            </h1>
            <p class="text-gray-500 text-sm">
                Kelola kategori pengaduan agar laporan masyarakat tertata dengan baik.
            </p>
        </div>

        <a href="{{ route('admin.kategori.create') }}"
           class="flex items-center gap-2 px-5 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 shadow-md transition duration-300">
           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
           </svg>
           Tambah Kategori
        </a>
    </div>

    <!-- Tabel Kategori -->
    <div class="overflow-x-auto animate-fade-in-up">
        <table class="min-w-full bg-white shadow-lg rounded-xl overflow-hidden">
            <thead class="bg-gray-50 text-gray-700 uppercase text-sm tracking-wide">
                <tr>
                    <th class="px-6 py-3 text-left">No</th>
                    <th class="px-6 py-3 text-left">Nama Kategori</th>
                    <th class="px-6 py-3 text-left">Deskripsi</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($kategoris as $index => $kategori)
                <tr class="hover:bg-gray-50 transition duration-200 animate-fade-in-up delay-{{ $index * 100 }}">
                    <td class="px-6 py-3 text-gray-500">{{ $index + 1 }}</td>
                    <td class="px-6 py-3 font-medium text-gray-800">{{ $kategori->nama }}</td>
                    <td class="px-6 py-3 text-gray-600">{{ $kategori->deskripsi }}</td>
                    <td class="px-6 py-3 text-center flex justify-center items-center gap-3">
                        <!-- Tombol Edit Icon -->
                        <a href="{{ route('admin.kategori.edit', $kategori->id) }}"
                           class="text-yellow-500 hover:text-yellow-600 transition transform hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5m-6-6l6 6m0 0V9m0 6h-6"/>
                            </svg>
                        </a>

                        <!-- Tombol Hapus Icon -->
                        <form action="{{ route('admin.kategori.destroy', $kategori->id) }}" method="POST" class="inline-block"
                              onsubmit="return confirm('Hapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-600 transition transform hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4a1 1 0 011 1v1H9V4a1 1 0 011-1z"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-8 text-gray-500">Belum ada kategori.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
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
