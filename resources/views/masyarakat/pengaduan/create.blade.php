@extends('masyarakat.layout.app')

@section('title', 'Buat Pengaduan')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-16">
    
    {{-- Header Section --}}
    <div class="mb-10">
        <h1 class="text-3xl font-semibold text-gray-900">Buat Pengaduan</h1>
        <p class="mt-2 text-gray-600 max-w-2xl">
            Gunakan halaman ini untuk menyampaikan laporan atau keluhan kepada pihak terkait.
            Pastikan informasi yang Anda masukkan jelas dan benar agar dapat diproses dengan cepat.
        </p>
    </div>

    {{-- Form Section --}}
    <form action="{{ route('masyarakat.pengaduan.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-8 border-t pt-10">
        @csrf

        {{-- Judul Pengaduan --}}
        <div>
            <label class="block text-sm font-medium text-gray-800 mb-1">
                Judul Pengaduan
            </label>
            <input type="text"
                   name="judul"
                   value="{{ old('judul') }}"
                   placeholder="Contoh: Lampu jalan mati di RT 05"
                   class="w-full border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-200"
                   required>
        </div>

        {{-- Isi Pengaduan --}}
        <div>
            <label class="block text-sm font-medium text-gray-800 mb-1">
                Isi Pengaduan
            </label>
            <textarea name="isi"
                      rows="6"
                      placeholder="Jelaskan kondisi, penyebab, dan dampaknya bagi masyarakat..."
                      class="w-full border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-200"
                      required>{{ old('isi') }}</textarea>
        </div>

        {{-- Lokasi Kejadian --}}
        <div class="space-y-6 pt-6 border-t">
            <h2 class="text-lg font-semibold text-gray-900">
                Lokasi Kejadian
            </h2>

            {{-- Alamat Lengkap --}}
            <div>
                <label class="block text-sm font-medium mb-1">
                    Alamat Lengkap
                </label>
                <textarea name="alamat"
                          rows="3"
                          placeholder="Contoh: Jl. Trans Sulawesi, depan SD Negeri 3"
                          class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200"
                          required>{{ old('alamat') }}</textarea>
            </div>

            {{-- Grid Lokasi Detail --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Desa / Kelurahan --}}
                <div>
                    <label class="block text-sm font-medium mb-1">
                        Desa / Kelurahan
                    </label>
                    <input type="text"
                           name="desa"
                           value="{{ old('desa') }}"
                           placeholder="Contoh: Desa Paku"
                           class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200"
                           required>
                </div>

                {{-- Kecamatan --}}
                <div>
                    <label class="block text-sm font-medium mb-1">
                        Kecamatan
                    </label>
                    <input type="text"
                           name="kecamatan"
                           value="{{ old('kecamatan') }}"
                           placeholder="Contoh: Binuang"
                           class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200"
                           required>
                </div>

                {{-- Kabupaten / Kota --}}
                <div>
                    <label class="block text-sm font-medium mb-1">
                        Kabupaten / Kota
                    </label>
                    <input type="text"
                           name="kabupaten"
                           value="{{ old('kabupaten') }}"
                           placeholder="Contoh: Polewali Mandar"
                           class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200"
                           required>
                </div>

                {{-- Provinsi --}}
                <div>
                    <label class="block text-sm font-medium mb-1">
                        Provinsi
                    </label>
                    <input type="text"
                           name="provinsi"
                           value="{{ old('provinsi') }}"
                           placeholder="Contoh: Sulawesi Barat"
                           class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200"
                           required>
                </div>
            </div>
        </div>

        {{-- Foto Pendukung --}}
        <div>
            <label class="block text-sm font-medium text-gray-800 mb-1">
                Foto Pendukung (Opsional)
            </label>
            <input type="file"
                   name="foto"
                   accept="image/*"
                   class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>

        {{-- Submit Button --}}
        <div class="pt-6">
            <button type="submit"
                    class="px-6 py-3 bg-blue-600 text-white font-medium hover:bg-blue-700 transition duration-200">
                Kirim Pengaduan
            </button>
        </div>
    </form>
</div>

{{-- Tutorial Modal --}}
<div id="tutorialModal" 
     class="fixed inset-0 z-50 pointer-events-none opacity-0 transition-opacity duration-300 flex items-center justify-center">
    
    {{-- Backdrop --}}
    <div id="tutorialBackdrop" 
         class="absolute inset-0 bg-black/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    {{-- Modal Box --}}
    <div id="tutorialBox" 
         class="relative z-10 w-full max-w-2xl mx-4 bg-white shadow-xl transform scale-[0.96] translate-y-4 opacity-0 transition-all duration-300 ease-out">
        
        {{-- Modal Header --}}
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h2 class="text-lg font-semibold text-gray-900">Panduan Mengisi Pengaduan</h2>
            <button id="closeTutorial" 
                    class="text-gray-500 hover:text-gray-800 transition duration-200"
                    aria-label="Tutup">
                ✕
            </button>
        </div>

        {{-- Modal Content --}}
        <div class="px-6 py-6 space-y-6 text-sm text-gray-700">
            <div>
                <p class="font-semibold text-gray-900 mb-1">1. Judul Pengaduan</p>
                <p>Gunakan judul singkat dan jelas agar laporan mudah dipahami.</p>
            </div>
            
            <div>
                <p class="font-semibold text-gray-900 mb-1">2. Isi Pengaduan</p>
                <p>Jelaskan lokasi, kondisi, dan dampak masalah secara rinci.</p>
            </div>
            
            <div>
                <p class="font-semibold text-gray-900 mb-1">3. Foto Pendukung</p>
                <p>Tambahkan foto untuk mempercepat proses verifikasi.</p>
            </div>
            
            <div class="border-l-4 border-blue-500 bg-gray-50 p-4 text-xs italic">
                Pengaduan yang jelas akan diproses lebih cepat.
            </div>
        </div>

        {{-- Modal Footer --}}
        <div class="px-6 py-4 border-t flex justify-end">
            <button id="closeTutorialBtn" 
                    class="px-4 py-2 bg-blue-600 text-white text-sm hover:bg-blue-700 transition duration-200">
                Mengerti
            </button>
        </div>
    </div>
</div>



{{-- JavaScript for Tutorial Modal --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Cache DOM elements
    const elements = {
        openBtn: document.getElementById('openTutorial'),
        modal: document.getElementById('tutorialModal'),
        backdrop: document.getElementById('tutorialBackdrop'),
        box: document.getElementById('tutorialBox'),
        closeBtns: [
            document.getElementById('closeTutorial'),
            document.getElementById('closeTutorialBtn'),
            document.getElementById('tutorialBackdrop')
        ]
    };

    /**
     * Toggle modal visibility
     * @param {boolean} isOpen - Whether to open or close the modal
     */
    const toggleModal = (isOpen) => {
        if (isOpen) {
            // Open modal
            elements.modal.classList.remove('pointer-events-none');
            document.body.classList.add('overflow-hidden');
            
            requestAnimationFrame(() => {
                elements.modal.classList.add('opacity-100');
                elements.backdrop.classList.add('opacity-100');
                elements.box.classList.remove('opacity-0', 'scale-[0.96]', 'translate-y-4');
                elements.box.classList.add('opacity-100', 'scale-100', 'translate-y-0');
            });
        } else {
            // Close modal
            elements.modal.classList.remove('opacity-100');
            elements.backdrop.classList.remove('opacity-100');
            elements.box.classList.add('opacity-0', 'scale-[0.96]', 'translate-y-4');
            elements.box.classList.remove('opacity-100', 'scale-100', 'translate-y-0');
            
            setTimeout(() => {
                elements.modal.classList.add('pointer-events-none');
                document.body.classList.remove('overflow-hidden');
            }, 300);
        }
    };

    // Event: Open modal
    elements.openBtn?.addEventListener('click', () => toggleModal(true));

    // Event: Close modal (multiple buttons)
    elements.closeBtns.forEach(btn => {
        btn?.addEventListener('click', () => toggleModal(false));
    });

    // Event: Close modal on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !elements.modal.classList.contains('pointer-events-none')) {
            toggleModal(false);
        }
    });
});
</script>
@endsection