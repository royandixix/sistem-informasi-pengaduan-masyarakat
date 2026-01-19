@extends('admin.layout.app')

@section('title', 'Edit Kategori Pengaduan')

@section('content')
<div class="px-4 py-10 max-w-3xl mx-auto space-y-6 animate-fade-in">

    <div class="space-y-1">
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
            Edit Kategori Pengaduan
        </h1>
        <p class="text-gray-500 text-sm">
            Perbarui nama atau deskripsi kategori pengaduan.
        </p>
    </div>

    <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" class="space-y-6 mt-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-800 mb-1">Nama Kategori</label>
            <input type="text" name="nama" value="{{ old('nama', $kategori->nama) }}"
                   class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200"
                   required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-800 mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="4"
                      class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
        </div>

        <div>
            <button type="submit"
                    class="px-6 py-2 rounded-xl bg-yellow-500 text-white font-medium hover:bg-yellow-600 transition duration-300">
                Perbarui Kategori
            </button>
            <a href="{{ route('admin.kategori.index') }}"
               class="px-6 py-2 rounded-xl bg-gray-200 text-gray-800 hover:bg-gray-300 transition duration-300">
               Batal
            </a>
        </div>
    </form>

</div>
@endsection
