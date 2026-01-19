@extends('admin.layout.app')

@section('title', 'Edit Instansi')

@section('content')
<div class="px-4 py-10 max-w-2xl mx-auto">

    <h1 class="text-2xl font-bold mb-6">Edit Instansi</h1>

    <!-- Tampilkan error validasi -->
    @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form edit -->
    <form action="{{ route('admin.instansi.update', $instansi->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-medium">Nama Instansi</label>
            <input type="text" name="nama" value="{{ $instansi->nama }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border px-3 py-2 rounded">{{ $instansi->deskripsi }}</textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">Alamat</label>
            <textarea name="alamat" class="w-full border px-3 py-2 rounded">{{ $instansi->alamat }}</textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">Kontak</label>
            <input type="text" name="kontak" value="{{ $instansi->kontak }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Status</label>
            <select name="status" class="w-full border px-3 py-2 rounded" required>
                <option value="aktif" {{ $instansi->status=='aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $instansi->status=='nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
    </form>
</div>
@endsection
