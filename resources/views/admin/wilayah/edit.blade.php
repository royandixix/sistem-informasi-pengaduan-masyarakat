@extends('admin.layout.app')

@section('title', 'Edit Wilayah')

@section('content')
    <div class="px-4 py-10 max-w-2xl mx-auto">

        <h1 class="text-2xl font-bold mb-6">Edit Wilayah</h1>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.wilayah.update', $wilayah->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block mb-1 font-medium">Nama Wilayah</label>
                <input type="text" name="nama" value="{{ $wilayah->nama }}" class="w-full border px-3 py-2 rounded"
                    required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border px-3 py-2 rounded">{{ $wilayah->deskripsi }}</textarea>
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-800">Tipe Wilayah</label>
                <select name="tipe" class="w-full border px-4 py-2 rounded-lg" required>
                    <option value="kecamatan" {{ $wilayah->tipe == 'kecamatan' ? 'selected' : '' }}>Kecamatan</option>
                    <option value="desa" {{ $wilayah->tipe == 'desa' ? 'selected' : '' }}>Desa</option>
                    <option value="kelurahan" {{ $wilayah->tipe == 'kelurahan' ? 'selected' : '' }}>Kelurahan</option>
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">Status</label>
                <select name="status" class="w-full border px-3 py-2 rounded" required>
                    <option value="aktif" {{ $wilayah->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ $wilayah->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
        </form>
    </div>
@endsection
