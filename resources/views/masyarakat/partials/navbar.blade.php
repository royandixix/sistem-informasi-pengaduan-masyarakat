{{-- resources/views/masyarakat/layout/navbar.blade.php --}}
<header class="fixed inset-x-0 top-0 z-50 bg-white/80 backdrop-blur-xl border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between">

        <!-- Brand -->
        <a href="{{ route('masyarakat.index') }}" class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600 text-white flex items-center justify-center">
                🏢
            </div>
            <div>
                <p class="text-sm font-semibold">Pengaduan</p>
                <p class="text-xs text-gray-500">Masyarakat</p>
            </div>
        </a>

        <!-- Menu -->
        <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
            <a href="{{ route('masyarakat.index') }}">Beranda</a>
            <a href="{{ route('masyarakat.pengaduan.status') }}">Cek Status</a>
            <a href="{{ route('masyarakat.pengaduan.create') }}">Ajukan Pengaduan</a>

            @guest
                <button onclick="openAuthModal()"
                    class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gray-200 transition">
                    👤
                </button>
            @endguest

            @auth
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-700">Hi, <strong>{{ auth()->user()->name }}</strong></span>
                    <form action="{{ route('masyarakat.logout') }}" method="POST">
                        @csrf
                        <button class="text-sm text-red-600 hover:underline">Logout</button>
                    </form>
                </div>
            @endauth
        </nav>
    </div>
</header>

{{-- MODAL LOGIN/REGISTER --}}
<div id="authModal" class="fixed inset-0 z-50 hidden bg-black/40 backdrop-blur-sm flex items-center justify-center">
    <div class="bg-white w-full max-w-md rounded-xl p-6 relative shadow-xl">
        <button onclick="closeAuthModal()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">✕</button>

        {{-- LOGIN --}}
        <div id="loginForm">
            <h2 class="text-xl font-bold mb-4">Login</h2>
            <form action="{{ route('masyarakat.login.process') }}" method="POST" class="space-y-3">
                @csrf
                <input type="email" name="email" placeholder="Email" class="w-full border px-3 py-2 rounded" required>
                <input type="password" name="password" placeholder="Password" class="w-full border px-3 py-2 rounded" required>
                <label class="inline-flex items-center mb-2">
                    <input type="checkbox" name="remember" class="mr-2"> Ingat saya
                </label>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Login</button>
            </form>
            <p class="text-sm mt-4 text-center">
                Belum punya akun? 
                <button type="button" onclick="switchToRegister()" class="text-blue-600 underline">Register</button>
            </p>
        </div>

        {{-- REGISTER --}}
        <div id="registerForm" class="hidden">
            <h2 class="text-xl font-bold mb-4">Register</h2>
            <form action="{{ route('masyarakat.register.process') }}" method="POST" class="space-y-3">
                @csrf
                <input type="text" name="name" placeholder="Nama" class="w-full border px-3 py-2 rounded" required>
                <input type="email" name="email" placeholder="Email" class="w-full border px-3 py-2 rounded" required>
                <input type="password" name="password" placeholder="Password" class="w-full border px-3 py-2 rounded" required>
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" class="w-full border px-3 py-2 rounded" required>
                <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Register</button>
            </form>
            <p class="text-sm mt-4 text-center">
                Sudah punya akun? 
                <button type="button" onclick="switchToLogin()" class="text-blue-600 underline">Login</button>
            </p>
        </div>
    </div>
</div>

{{-- Toast Container --}}
<div id="toastContainer" class="fixed top-4 right-4 z-50 flex flex-col gap-2"></div>

<script>
    // === Modal ===
    function openAuthModal() {
        document.getElementById('authModal').classList.remove('hidden');
        switchToLogin();
        document.body.classList.add('overflow-hidden');
    }
    function closeAuthModal() {
        document.getElementById('authModal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
    function switchToRegister() {
        document.getElementById('loginForm').classList.add('hidden');
        document.getElementById('registerForm').classList.remove('hidden');
    }
    function switchToLogin() {
        document.getElementById('registerForm').classList.add('hidden');
        document.getElementById('loginForm').classList.remove('hidden');
    }

    // === Toast Notifications ===
    document.addEventListener('DOMContentLoaded', () => {
        const container = document.getElementById('toastContainer');

        function showToast(message, type='success'){
            const toast = document.createElement('div');
            toast.className = `
                toast max-w-xs w-full px-4 py-3 rounded-lg shadow-lg flex items-center gap-3
                text-white font-medium cursor-pointer
                ${type==='success' ? 'bg-green-500' : 'bg-red-500'}
                transform translate-x-20 opacity-0 transition-all duration-300
            `;
            toast.innerHTML = `<span>${message}</span>
                               <button class="ml-auto font-bold">&times;</button>`;

            toast.querySelector('button').addEventListener('click', ()=> toast.remove());

            container.appendChild(toast);
            requestAnimationFrame(()=> toast.classList.add('show'));

            setTimeout(()=>{
                toast.classList.remove('show');
                toast.addEventListener('transitionend', ()=> toast.remove());
            }, 5000);
        }

        // === Laravel Flash Messages ===
        @if(session('success'))
            showToast(@json(session('success')), 'success');
        @endif
        @if(session('error'))
            showToast(@json(session('error')), 'error');
        @endif
    });
</script>

<style>
.toast.show {
    transform: translateX(0);
    opacity: 1;
}
</style>
