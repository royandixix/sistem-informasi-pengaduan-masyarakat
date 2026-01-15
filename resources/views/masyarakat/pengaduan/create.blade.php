@extends('masyarakat.layout.app')

@section('title', 'Buat Pengaduan')

@section('content')
    <div class="max-w-5xl mx-auto px-4 py-16">

        {{-- Success Notification --}}
        @if (session('success'))
            <div id="successNotification"
                class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 shadow-md transform transition-all duration-300 ease-out">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3 flex-1">
                        <p class="text-sm font-medium text-green-800">
                            {{ session('success') }}
                        </p>
                    </div>
                    <button onclick="closeNotification()" class="ml-3 text-green-500 hover:text-green-700 transition">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        {{-- Error Notification --}}
        @if ($errors->any())
            <div id="errorNotification" class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 shadow-md">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3 flex-1">
                        <p class="text-sm font-medium text-red-800 mb-2">Terjadi kesalahan:</p>
                        <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button onclick="closeErrorNotification()" class="ml-3 text-red-500 hover:text-red-700 transition">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        {{-- Header Section --}}
        <div class="mb-10">
            <h1 class="text-3xl font-semibold text-gray-900">Buat Pengaduan</h1>
            <p class="mt-2 text-gray-600 max-w-2xl">
                Gunakan halaman ini untuk menyampaikan laporan atau keluhan kepada pihak terkait.
                Pastikan informasi yang Anda masukkan jelas dan benar agar dapat diproses dengan cepat.
            </p>
        </div>

        {{-- Form Section --}}
        <form id="pengaduanForm" action="{{ route('masyarakat.pengaduan.store') }}" method="POST"
            enctype="multipart/form-data" class="space-y-8 border-t pt-10">

            @csrf

            {{-- Judul Pengaduan --}}
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">
                    Judul Pengaduan
                </label>
                <input type="text" name="judul" value="{{ old('judul') }}"
                    placeholder="Contoh: Lampu jalan mati di RT 05"
                    class="w-full border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-200"
                    required>
            </div>

            {{-- Isi Pengaduan --}}
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">
                    Isi Pengaduan
                </label>
                <textarea name="isi" rows="6" placeholder="Jelaskan kondisi, penyebab, dan dampaknya bagi masyarakat..."
                    class="w-full border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-200" required>{{ old('isi') }}</textarea>
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
                    <textarea name="alamat" rows="3" placeholder="Contoh: Jl. Trans Sulawesi, depan SD Negeri 3"
                        class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200" required>{{ old('alamat') }}</textarea>
                </div>

                {{-- Grid Lokasi Detail --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Desa / Kelurahan --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Desa / Kelurahan
                        </label>
                        <input type="text" name="desa" value="{{ old('desa') }}" placeholder="Contoh: Desa Paku"
                            class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200"
                            required>
                    </div>

                    {{-- Kecamatan --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Kecamatan
                        </label>
                        <input type="text" name="kecamatan" value="{{ old('kecamatan') }}" placeholder="Contoh: Binuang"
                            class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200"
                            required>
                    </div>

                    {{-- Kabupaten / Kota --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Kabupaten / Kota
                        </label>
                        <input type="text" name="kabupaten" value="{{ old('kabupaten') }}"
                            placeholder="Contoh: Polewali Mandar"
                            class="w-full border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200"
                            required>
                    </div>

                    {{-- Provinsi --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Provinsi
                        </label>
                        <input type="text" name="provinsi" value="{{ old('provinsi') }}"
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
                <input type="file" name="foto" accept="image/*"
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
                <button id="closeTutorial" class="text-gray-500 hover:text-gray-800 transition duration-200"
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

    {{-- Login Required Modal --}}
    <div id="loginAlertModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-sm">

        <div class="bg-white w-full max-w-md mx-4 rounded-lg shadow-xl overflow-hidden">

            {{-- Header --}}
            <div class="px-6 py-4 border-b flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">
                    Login Diperlukan
                </h3>
                <button onclick="closeLoginAlert()" class="text-gray-500 hover:text-gray-800">
                    ✕
                </button>
            </div>

            {{-- Content --}}
            <div class="px-6 py-6 text-gray-700 text-sm space-y-4">
                <p>
                    Untuk <span class="font-semibold">mengajukan pengaduan</span>,
                    silakan login terlebih dahulu atau buat akun baru jika belum punya.
                </p>

                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-3 text-xs text-yellow-800">
                    Akses ini hanya tersedia untuk pengguna terdaftar.
                </div>
            </div>

            {{-- Footer --}}
            <div class="px-6 py-4 border-t flex justify-end gap-3">
                <button onclick="closeLoginAlert()" class="px-4 py-2 text-sm border border-gray-300 hover:bg-gray-100">
                    OK
                </button>
            </div>
        </div>
    </div>

    {{-- Success Alert Modal (Client-side) --}}
    <div id="successAlertModal"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-sm">
        <div class="bg-white w-full max-w-md mx-4 rounded-lg shadow-xl overflow-hidden transform transition-all duration-300 scale-95 opacity-0"
            id="successModalBox">

            {{-- Header --}}
            <div class="px-6 py-4 bg-green-50 border-b border-green-200 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-green-800">
                        Berhasil!
                    </h3>
                </div>
                <button onclick="closeSuccessAlert()" class="text-green-600 hover:text-green-800 transition">
                    ✕
                </button>
            </div>

            {{-- Content --}}
            <div class="px-6 py-6 text-gray-700">
                <p class="text-sm mb-4">
                    Pengaduan Anda telah berhasil dikirim dan akan segera diproses oleh pihak terkait.
                </p>
                <div class="bg-blue-50 border-l-4 border-blue-400 p-3 text-xs text-blue-800">
                    <p class="font-medium mb-1">Langkah Selanjutnya:</p>
                    <p>Anda dapat memantau status pengaduan melalui halaman <span class="font-semibold">Riwayat
                            Pengaduan</span></p>
                </div>
            </div>

            {{-- Footer --}}
            <div class="px-6 py-4 border-t bg-gray-50 flex justify-end gap-3">
                <button onclick="closeSuccessAlert()"
                    class="px-4 py-2 text-sm bg-green-600 text-white hover:bg-green-700 transition rounded">
                    OK
                </button>
            </div>
        </div>
    </div>

    {{-- JavaScript --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ===============================
            // 1. Notification Auto-hide & Close
            // ===============================
            const successNotification = document.getElementById('successNotification');
            if (successNotification) {
                setTimeout(() => {
                    successNotification.style.opacity = '0';
                    successNotification.style.transform = 'translateY(-20px)';
                    setTimeout(() => successNotification.remove(), 300);
                }, 5000);
            }

            window.closeNotification = function() {
                if (successNotification) {
                    successNotification.style.opacity = '0';
                    successNotification.style.transform = 'translateY(-20px)';
                    setTimeout(() => successNotification.remove(), 300);
                }
            }

            const errorNotification = document.getElementById('errorNotification');
            window.closeErrorNotification = function() {
                if (errorNotification) {
                    errorNotification.style.opacity = '0';
                    setTimeout(() => errorNotification.remove(), 300);
                }
            }

            // ===============================
            // 2. Tutorial Modal
            // ===============================
            const tutorialModal = document.getElementById('tutorialModal');
            const tutorialBackdrop = document.getElementById('tutorialBackdrop');
            const tutorialBox = document.getElementById('tutorialBox');
            const tutorialCloseBtns = [
                document.getElementById('closeTutorial'),
                document.getElementById('closeTutorialBtn'),
                document.getElementById('tutorialBackdrop')
            ];

            function toggleTutorialModal(open) {
                if (open) {
                    tutorialModal.classList.remove('pointer-events-none');
                    document.body.classList.add('overflow-hidden');
                    requestAnimationFrame(() => {
                        tutorialModal.classList.add('opacity-100');
                        tutorialBackdrop.classList.add('opacity-100');
                        tutorialBox.classList.remove('opacity-0', 'scale-[0.96]', 'translate-y-4');
                        tutorialBox.classList.add('opacity-100', 'scale-100', 'translate-y-0');
                    });
                } else {
                    tutorialModal.classList.remove('opacity-100');
                    tutorialBackdrop.classList.remove('opacity-100');
                    tutorialBox.classList.add('opacity-0', 'scale-[0.96]', 'translate-y-4');
                    tutorialBox.classList.remove('opacity-100', 'scale-100', 'translate-y-0');
                    setTimeout(() => {
                        tutorialModal.classList.add('pointer-events-none');
                        document.body.classList.remove('overflow-hidden');
                    }, 300);
                }
            }

            tutorialCloseBtns.forEach(btn => {
                btn?.addEventListener('click', () => toggleTutorialModal(false));
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !tutorialModal.classList.contains('pointer-events-none')) {
                    toggleTutorialModal(false);
                }
            });

            // ===============================
            // 3. Login Alert Modal
            // ===============================
            const loginModal = document.getElementById('loginAlertModal');

            window.openLoginAlert = function() {
                loginModal.classList.remove('hidden');
                loginModal.classList.add('flex');
                document.body.classList.add('overflow-hidden');
            }

            window.closeLoginAlert = function() {
                loginModal.classList.add('hidden');
                loginModal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            }

            // ===============================
            // 4. Success Alert Modal
            // ===============================
            const successModal = document.getElementById('successAlertModal');
            const successModalBox = document.getElementById('successModalBox');

            window.openSuccessAlert = function() {
                successModal.classList.remove('hidden');
                successModal.classList.add('flex');
                document.body.classList.add('overflow-hidden');
                setTimeout(() => {
                    successModalBox.classList.remove('scale-95', 'opacity-0');
                    successModalBox.classList.add('scale-100', 'opacity-100');
                }, 10);
            }

            window.closeSuccessAlert = function() {
                successModalBox.classList.add('scale-95', 'opacity-0');
                successModalBox.classList.remove('scale-100', 'opacity-100');
                setTimeout(() => {
                    successModal.classList.add('hidden');
                    successModal.classList.remove('flex');
                    document.body.classList.remove('overflow-hidden');
                }, 300);
            }

            // ===============================
            // 5. Form Submission
            // ===============================
            const form = document.getElementById('pengaduanForm');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const isGuest = {{ auth()->check() ? 'false' : 'true' }};

                    if (isGuest) {
                        e.preventDefault(); // cegah guest submit
                        openLoginAlert();
                    }
                    // ✅ User login -> form submit normal, Laravel akan simpan data
                });
            }


            document.addEventListener('DOMContentLoaded', function() {
                @if (session('success'))
                    // Jika ada success session, buka modal
                    openSuccessAlert();
                @endif
            });

        });
    </script>


@endsection
