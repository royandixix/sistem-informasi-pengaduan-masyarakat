<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
/* Animasi masuk smooth */
.fade-in-left { opacity: 0; transform: translateX(-40px); transition: opacity 1s ease-out, transform 1s ease-out; }
.fade-in-left.show { opacity: 1; transform: translateX(0); }

.fade-in-up { opacity: 0; transform: translateY(40px); transition: opacity 1s ease-out, transform 1s ease-out; }
.fade-in-up.show { opacity: 1; transform: translateY(0); }

/* Toast animation */
.toast { transform: translateX(80px); opacity: 0; transition: all 0.3s ease; }
.toast.show { transform: translateX(0); opacity: 1; }
</style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center px-4 py-12">

<!-- Container utama -->
<div class="flex flex-col md:flex-row items-center justify-center w-full max-w-6xl gap-12">

    <!-- Vektor / Ilustrasi -->
    <div class="flex-1 flex justify-center md:justify-end fade-in-left" id="vectorIllustration">
        <img src="/img/auth/undraw_mobile-encryption_flk2.png" 
             alt="Register Illustration" 
             class="w-3/4 md:w-[400px] lg:w-[450px]">
    </div>

    <!-- Form -->
    <div class="flex-1 w-full max-w-md fade-in-up" id="registerForm">

        <!-- Header -->
        <div class="text-center md:text-left mb-8">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800">
                Daftar Akun Baru
            </h1>
            <p class="mt-4 text-gray-600 text-lg md:text-xl">
                Buat akun Anda untuk mengakses sistem pengaduan masyarakat secara online.
            </p>
        </div>

        <!-- Form Register -->
        @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">Password</label>
                <input type="password" name="password"
                       class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                       class="w-full border border-gray-300 px-4 py-2.5 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200" required>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                Daftar
            </button>
        </form>

        <!-- Link Login -->
        <p class="mt-6 text-sm text-center md:text-left text-gray-600">
            Sudah punya akun? 
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">Login di sini</a>
        </p>

        <!-- Tombol Buka Modal -->
        <div class="text-center md:text-left mt-4">
            <button id="openRegisterInfo" class="text-blue-600 hover:underline text-sm font-medium">
                Panduan Pendaftaran
            </button>
        </div>

    </div>
</div>

<!-- Modal Panduan Register -->
<div id="registerInfoModal" class="fixed inset-0 z-50 pointer-events-none flex items-center justify-center opacity-0 transition-opacity duration-300">
    <div id="registerBackdrop" class="absolute inset-0 bg-black/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>
    <div id="registerBox" class="relative z-10 w-full max-w-md mx-4 bg-white shadow-xl rounded-2xl transform scale-[0.96] translate-y-4 opacity-0 transition-all duration-300 ease-out">
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h2 class="text-lg font-semibold text-gray-900">Panduan Pendaftaran</h2>
            <button id="closeRegisterModal" class="text-gray-500 hover:text-gray-800 transition duration-200">✕</button>
        </div>
        <div class="px-6 py-6 space-y-4 text-gray-700 text-sm">
            <p>Isi Nama Lengkap, Email, dan Password Anda dengan benar.</p>
            <p>Gunakan email yang valid agar dapat menerima konfirmasi dan notifikasi sistem.</p>
            <p>Pastikan password dan konfirmasi password sama agar pendaftaran berhasil.</p>
        </div>
        <div class="px-6 py-4 border-t flex justify-end">
            <button id="closeRegisterBtn" class="px-4 py-2 bg-blue-600 text-white text-sm hover:bg-blue-700 transition">Mengerti</button>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="fixed top-4 right-4 z-50 flex flex-col gap-2"></div>

<script>
// Animasi masuk ketika halaman siap
window.addEventListener('load', () => {
    document.getElementById('vectorIllustration').classList.add('show');
    document.getElementById('registerForm').classList.add('show');
});

// Modal interaktif
document.addEventListener('DOMContentLoaded', () => {
    const modalElements = {
        openBtn: document.getElementById('openRegisterInfo'),
        modal: document.getElementById('registerInfoModal'),
        backdrop: document.getElementById('registerBackdrop'),
        box: document.getElementById('registerBox'),
        closeBtns: [
            document.getElementById('closeRegisterModal'),
            document.getElementById('closeRegisterBtn'),
            document.getElementById('registerBackdrop')
        ]
    };

    const toggleModal = (isOpen) => {
        if(isOpen){
            modalElements.modal.classList.remove('pointer-events-none');
            document.body.classList.add('overflow-hidden');
            requestAnimationFrame(() => {
                modalElements.modal.classList.add('opacity-100');
                modalElements.backdrop.classList.add('opacity-100');
                modalElements.box.classList.remove('opacity-0','scale-[0.96]','translate-y-4');
                modalElements.box.classList.add('opacity-100','scale-100','translate-y-0');
            });
        } else {
            modalElements.modal.classList.remove('opacity-100');
            modalElements.backdrop.classList.remove('opacity-100');
            modalElements.box.classList.add('opacity-0','scale-[0.96]','translate-y-4');
            modalElements.box.classList.remove('opacity-100','scale-100','translate-y-0');
            setTimeout(() => {
                modalElements.modal.classList.add('pointer-events-none');
                document.body.classList.remove('overflow-hidden');
            }, 300);
        }
    };

    modalElements.openBtn?.addEventListener('click', () => toggleModal(true));
    modalElements.closeBtns.forEach(btn => btn?.addEventListener('click', () => toggleModal(false)));
    document.addEventListener('keydown', e => { 
        if(e.key==='Escape' && !modalElements.modal.classList.contains('pointer-events-none')) toggleModal(false); 
    });
});

// Toast notifications
document.addEventListener('DOMContentLoaded', () => {
    const toastContainer = document.getElementById('toastContainer');

    @if(session('success'))
        showToast("{{ session('success') }}", "success");
    @endif

    @if(session('error'))
        showToast("{{ session('error') }}", "error");
    @endif

    function showToast(message, type="success"){
        const toast = document.createElement('div');
        toast.className = `
            toast max-w-xs w-full px-4 py-3 rounded-lg shadow-lg flex items-center gap-3
            text-white font-medium cursor-pointer
            ${type === 'success' ? 'bg-green-500' : 'bg-red-500'}
        `;
        toast.innerHTML = `<span>${message}</span>
                           <button class="ml-auto font-bold">&times;</button>`;

        toast.querySelector('button').addEventListener('click', ()=> toast.remove());

        toastContainer.appendChild(toast);
        requestAnimationFrame(()=> toast.classList.add('show'));

        setTimeout(()=>{
            toast.classList.remove('show');
            toast.addEventListener('transitionend', ()=> toast.remove());
        }, 5000);
    }
});
</script>

</body>
</html>
