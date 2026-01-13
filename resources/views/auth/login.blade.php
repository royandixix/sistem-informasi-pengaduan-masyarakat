<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Aduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi masuk smooth */
        .fade-in-left {
            opacity: 0;
            transform: translateX(-40px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }

        .fade-in-left.show {
            opacity: 1;
            transform: translateX(0);
        }

        .fade-in-up {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }

        .fade-in-up.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center px-4 py-12">

    <!-- Container utama -->
    <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-6xl gap-12">

        <!-- Vektor / Ilustrasi -->
        <div class="flex-1 flex justify-center md:justify-end fade-in-left" id="vectorIllustration">
            <img src="/img/auth/undraw_mobile-encryption_flk2.png" alt="Login Illustration"
                class="w-3/4 md:w-[400px] lg:w-[450px]">
        </div>

        <!-- Form -->
        <div class="flex-1 w-full max-w-md fade-in-up" id="loginForm">

            <!-- Header -->
            <div class="text-center md:text-left mb-8">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800">
                    Selamat Datang di Sistem Aduan Masyarakat
                </h1>
                <p class="mt-4 text-gray-600 text-lg md:text-xl">
                    Masuk untuk mengakses layanan pengaduan online. Pastikan akun Anda valid agar dapat mengajukan dan
                    memantau laporan dengan mudah dan transparan.
                </p>
            </div>

            <!-- Pesan sukses / error -->
            @if(session('success'))
                <div class="mb-4 text-green-700 bg-green-100 px-4 py-2 rounded">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="mb-4 text-red-700 bg-red-100 px-4 py-2 rounded">{{ session('error') }}</div>
            @endif

            <!-- Form Login -->
            <form action="{{ route('login.process') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-800 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200"
                        required autofocus>
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-800 mb-1">Password</label>
                    <input type="password" name="password"
                        class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200"
                        required>
                    @error('password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Ingat saya & Lupa password -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 text-gray-700">
                        <input type="checkbox" name="remember" class="rounded border-gray-300">
                        Ingat saya
                    </label>
                    <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">
                        Lupa password?
                    </a>
                </div>

                <!-- Tombol Login -->
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    Login
                </button>

                <!-- Link Daftar -->
                <p class="mt-6 text-sm text-center md:text-left text-gray-600">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">Daftar di sini</a>
                </p>
            </form>

            <!-- Tombol Buka Modal -->
            <div class="text-center md:text-left mt-4">
                <button id="openLoginInfo" class="text-blue-600 hover:underline text-sm font-medium">
                    Panduan Login
                </button>
            </div>

        </div>
    </div>

    <!-- Modal Panduan Login -->
    <div id="loginInfoModal"
        class="fixed inset-0 z-50 pointer-events-none flex items-center justify-center opacity-0 transition-opacity duration-300">
        <!-- Backdrop -->
        <div id="loginBackdrop"
            class="absolute inset-0 bg-black/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

        <!-- Modal Box -->
        <div id="loginBox"
            class="relative z-10 w-full max-w-md mx-4 bg-white shadow-xl rounded-2xl transform scale-[0.96] translate-y-4 opacity-0 transition-all duration-300 ease-out">

            <!-- Header Modal -->
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-900">Panduan Login</h2>
                <button id="closeLoginModal"
                    class="text-gray-500 hover:text-gray-800 transition duration-200">✕</button>
            </div>

            <!-- Konten Modal -->
            <div class="px-6 py-6 space-y-4 text-gray-700 text-sm">
                <p>Gunakan email dan password yang sudah terdaftar untuk masuk ke sistem aduan.</p>
                <p>Jika belum memiliki akun, silakan daftar terlebih dahulu.</p>
                <p>Pastikan informasi login Anda benar agar dapat mengakses pengaduan dan riwayat laporan.</p>
            </div>

            <!-- Footer Modal -->
            <div class="px-6 py-4 border-t flex justify-end">
                <button id="closeLoginBtn"
                    class="px-4 py-2 bg-blue-600 text-white text-sm hover:bg-blue-700 transition">
                    Mengerti
                </button>
            </div>
        </div>
    </div>

    <script>
        // Animasi masuk
        window.addEventListener('load', () => {
            document.getElementById('vectorIllustration').classList.add('show');
            document.getElementById('loginForm').classList.add('show');
        });

        // Modal interaktif
        document.addEventListener('DOMContentLoaded', () => {
            const modalElements = {
                openBtn: document.getElementById('openLoginInfo'),
                modal: document.getElementById('loginInfoModal'),
                backdrop: document.getElementById('loginBackdrop'),
                box: document.getElementById('loginBox'),
                closeBtns: [
                    document.getElementById('closeLoginModal'),
                    document.getElementById('closeLoginBtn'),
                    document.getElementById('loginBackdrop')
                ]
            };

            const toggleModal = (isOpen) => {
                if (isOpen) {
                    modalElements.modal.classList.remove('pointer-events-none');
                    document.body.classList.add('overflow-hidden');
                    requestAnimationFrame(() => {
                        modalElements.modal.classList.add('opacity-100');
                        modalElements.backdrop.classList.add('opacity-100');
                        modalElements.box.classList.remove('opacity-0', 'scale-[0.96]', 'translate-y-4');
                        modalElements.box.classList.add('opacity-100', 'scale-100', 'translate-y-0');
                    });
                } else {
                    modalElements.modal.classList.remove('opacity-100');
                    modalElements.backdrop.classList.remove('opacity-100');
                    modalElements.box.classList.add('opacity-0', 'scale-[0.96]', 'translate-y-4');
                    modalElements.box.classList.remove('opacity-100', 'scale-100', 'translate-y-0');
                    setTimeout(() => {
                        modalElements.modal.classList.add('pointer-events-none');
                        document.body.classList.remove('overflow-hidden');
                    }, 300);
                }
            };

            modalElements.openBtn?.addEventListener('click', () => toggleModal(true));
            modalElements.closeBtns.forEach(btn => btn?.addEventListener('click', () => toggleModal(false)));
            document.addEventListener('keydown', e => {
                if (e.key === 'Escape' && !modalElements.modal.classList.contains('pointer-events-none'))
                    toggleModal(false);
            });
        });
    </script>

</body>
</html>
