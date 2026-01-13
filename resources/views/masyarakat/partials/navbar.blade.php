<!-- resources/views/masyarakat/partials/navbar.blade.php -->
<header id="navbar" class="fixed inset-x-0 top-0 z-50 bg-white/80 backdrop-blur-xl border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between">

        <!-- Brand -->
        <a href="{{ route('masyarakat.index') }}" class="flex items-center gap-3 group">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600 text-white flex items-center justify-center shadow-sm transform transition-transform duration-300 group-hover:scale-110">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 21h18M4 21V5a1 1 0 011-1h4a1 1 0 011 1v16m4 0V9a1 1 0 011-1h4a1 1 0 011 1v12" />
                </svg>
            </div>
            <div class="leading-tight">
                <p class="text-sm font-semibold text-gray-900">Pengaduan</p>
                <p class="text-xs text-gray-500 group-hover:text-blue-600 transition-colors duration-300">Masyarakat</p>
            </div>
        </a>

        <!-- Desktop Menu -->
        <nav class="hidden md:flex items-center gap-10 text-sm font-medium">
            <a href="{{ route('masyarakat.index') }}" class="flex items-center gap-2 text-gray-700 hover:text-blue-600 transition-all duration-300">
                Beranda
            </a>
            <a href="{{ route('masyarakat.pengaduan.status') }}" class="flex items-center gap-2 text-gray-700 hover:text-blue-600 transition-all duration-300">
                Cek Status
            </a>
            <a href="{{ route('masyarakat.pengaduan.create') }}" class="flex items-center gap-2 text-gray-700 hover:text-green-600 transition-all duration-300">
                Ajukan Pengaduan
            </a>
        </nav>

        <!-- Mobile Menu Button -->
        <button id="menuBtn" class="md:hidden p-2 rounded-xl hover:bg-gray-100 transition duration-300">
            <svg id="menuIcon" class="w-6 h-6 text-gray-800 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path id="menuIconPath" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="md:hidden overflow-hidden transition-all duration-500 ease-in-out" style="max-height: 0;">
        <div class="px-4 py-4 space-y-3 bg-white border-t border-gray-100">
            <a href="{{ route('masyarakat.index') }}" class="mobile-menu-item block px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-300">
                Beranda
            </a>
            <a href="{{ route('masyarakat.pengaduan.status') }}" class="mobile-menu-item block px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-300">
                Cek Status
            </a>
            <a href="{{ route('masyarakat.pengaduan.create') }}" class="mobile-menu-item block px-4 py-3 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-600 transition-all duration-300">
                Ajukan Pengaduan
            </a>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    let isMenuOpen = false;
    menuBtn?.addEventListener('click', () => {
        isMenuOpen = !isMenuOpen;
        mobileMenu.style.maxHeight = isMenuOpen ? mobileMenu.scrollHeight + 'px' : '0';
        mobileMenu.classList.toggle('active', isMenuOpen);
    });
});
</script>
