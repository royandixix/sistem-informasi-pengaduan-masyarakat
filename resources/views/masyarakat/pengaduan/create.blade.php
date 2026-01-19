@extends('masyarakat.layout.app')

@section('title', 'Buat Pengaduan')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-16 space-y-12 animate-fade-in">

    {{-- HEADER --}}
    <div class="mb-10 animate-fade-in-up">
        <h1 class="text-3xl font-semibold text-gray-900">Buat Pengaduan</h1>
        <p class="mt-2 text-gray-600 max-w-2xl">
            Gunakan halaman ini untuk menyampaikan laporan atau keluhan kepada pihak terkait.
        </p>
    </div>

    {{-- FORM --}}
    <form id="pengaduanForm"
          action="{{ route('masyarakat.pengaduan.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-8 border-t pt-10 animate-fade-in-up">

        @csrf

        {{-- KATEGORI --}}
        <div>
            <label class="block text-sm font-medium text-gray-800 mb-1">Kategori Pengaduan</label>
            <select name="kategori_pengaduan_id" required
                class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:ring-2 focus:ring-blue-200 transition transform hover:scale-[1.02]">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_pengaduan_id') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- WILAYAH --}}
        <div>
            <label class="block text-sm font-medium text-gray-800 mb-1">Wilayah</label>
            <select name="wilayah_id" required
                class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:ring-2 focus:ring-blue-200 transition transform hover:scale-[1.02]">
                <option value="">-- Pilih Wilayah --</option>
                @foreach ($wilayahs as $wilayah)
                    <option value="{{ $wilayah->id }}" {{ old('wilayah_id') == $wilayah->id ? 'selected' : '' }}>
                        {{ $wilayah->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- INSTANSI --}}
        <div>
            <label class="block text-sm font-medium text-gray-800 mb-1">Instansi Tujuan</label>
            <select name="instansi_id" required
                class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:ring-2 focus:ring-blue-200 transition transform hover:scale-[1.02]">
                <option value="">-- Pilih Instansi --</option>
                @foreach ($instansis as $instansi)
                    <option value="{{ $instansi->id }}" {{ old('instansi_id') == $instansi->id ? 'selected' : '' }}>
                        {{ $instansi->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- JUDUL --}}
        <div>
            <label class="block text-sm font-medium mb-1">Judul Pengaduan</label>
            <input type="text" name="judul" value="{{ old('judul') }}" required
                class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:ring-2 focus:ring-blue-200 transition transform hover:scale-[1.02]">
        </div>

        {{-- ISI --}}
        <div>
            <label class="block text-sm font-medium mb-1">Isi Pengaduan</label>
            <textarea name="isi" rows="6" required
                class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-200 transition transform hover:scale-[1.01]">{{ old('isi') }}</textarea>
        </div>

        {{-- LOKASI --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach(['alamat','desa','kecamatan','kabupaten','provinsi'] as $lokasi)
            <div>
                <label class="block text-sm font-medium mb-1">{{ ucfirst($lokasi) }}</label>
                <input type="text" name="{{ $lokasi }}" value="{{ old($lokasi) }}" required
                    class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-200 transition transform hover:scale-[1.01]">
            </div>
            @endforeach
        </div>

        {{-- FOTO --}}
        <div>
            <label class="block text-sm font-medium mb-1">Foto Pendukung (Opsional)</label>
            <input type="file" name="foto" accept="image/*" id="fotoInput"
                class="block w-full text-sm file:mr-4 file:py-2 file:px-4 file:bg-blue-50 file:text-blue-700 rounded-lg">
            <div id="previewContainer" class="mt-2 hidden">
                <img id="previewImage" class="w-48 h-32 object-cover rounded-lg shadow-sm" alt="Preview Foto">
            </div>
        </div>

        {{-- SUBMIT --}}
        <div class="pt-6">
            <button type="submit"
                class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition transform hover:scale-[1.02]">
                Kirim Pengaduan
            </button>
        </div>
    </form>
</div>

<style>
.animate-fade-in { animation: fadeIn 0.6s ease forwards; }
.animate-fade-in-up { animation: fadeInUp 0.6s ease forwards; }
@keyframes fadeIn { from { opacity:0 } to { opacity:1 } }
@keyframes fadeInUp { from { opacity:0; transform:translateY(15px) } to { opacity:1; transform:translateY(0) } }
</style>

<script>
// Preview foto sebelum upload
const fotoInput = document.getElementById('fotoInput');
const previewContainer = document.getElementById('previewContainer');
const previewImage = document.getElementById('previewImage');

fotoInput.addEventListener('change', function() {
    const file = this.files[0];
    if(file) {
        const reader = new FileReader();
        reader.onload = e => {
            previewImage.src = e.target.result;
            previewContainer.classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    } else {
        previewContainer.classList.add('hidden');
        previewImage.src = '';
    }
});
</script>
@endsection
