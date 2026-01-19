@extends('admin.layout.app')

@section('title', 'Tambah Wilayah')

@section('content')
    <div class="px-4 py-10 max-w-2xl mx-auto">

        {{-- Header --}}
        <h1 class="text-3xl font-bold mb-6 text-gray-900">Tambah Wilayah</h1>

        {{-- Notifikasi Error --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded shadow">
                <p class="font-semibold mb-2">Terjadi kesalahan:</p>
                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Tambah Wilayah --}}
        <form action="{{ route('admin.wilayah.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded-xl shadow-md">
            @csrf

            {{-- Nama Wilayah --}}
            <div>
                <label class="block mb-2 font-medium text-gray-800">Nama Wilayah</label>
                <input type="text" name="nama" value="{{ old('nama') }}"
                    class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200"
                    placeholder="Contoh: Kecamatan Binuang" required>
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="block mb-2 font-medium text-gray-800">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                    class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200"
                    placeholder="Deskripsi wilayah (opsional)">{{ old('deskripsi') }}</textarea>
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-800">Tipe Wilayah</label>
                <select name="tipe" class="w-full border px-4 py-2 rounded-lg" required>
                    <option value="">-- Pilih Tipe --</option>
                    <option value="kecamatan" {{ old('tipe') == 'kecamatan' ? 'selected' : '' }}>Kecamatan</option>
                    <option value="desa" {{ old('tipe') == 'desa' ? 'selected' : '' }}>Desa</option>
                    <option value="kelurahan" {{ old('tipe') == 'kelurahan' ? 'selected' : '' }}>Kelurahan</option>
                </select>
            </div>

            {{-- Status --}}
            <div>
                <label class="block mb-2 font-medium text-gray-800">Status</label>
                <select name="status"
                    class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200"
                    required>
                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            {{-- Submit Button --}}
            <div class="pt-4">
                <button type="submit"
                    class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-200">
                    Simpan Wilayah
                </button>
            </div>
        </form>
    </div>
@endsection
