@extends('admin.layout.app')

@section('title', 'Tambah Instansi')

@section('content')
    <div class="px-4 py-10 max-w-2xl mx-auto">

        <h1 class="text-2xl font-bold mb-6">Tambah Instansi</h1>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.instansi.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-1 font-medium">Nama Instansi</label>
                <input type="text" name="nama" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border px-3 py-2 rounded"></textarea>
            </div>
            <div>
                <label class="block mb-1 font-medium">Alamat</label>
                <textarea name="alamat" class="w-full border px-3 py-2 rounded"></textarea>
            </div>
            <div>
                <label class="block mb-1 font-medium">Kontak</label>
                <input type="text" name="kontak" class="w-full border px-3 py-2 rounded" placeholder="08123456789"
                    required>
            </div>

            <div>
                <label class="block mb-1 font-medium">Status</label>
                <select name="status" class="w-full border px-3 py-2 rounded" required>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
        </form>
    </div>
@endsection
