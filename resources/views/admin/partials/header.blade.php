<header
    class="fixed top-0 left-0 right-0 h-16 bg-white
           border-b border-gray-200
           flex items-center justify-between
           px-4 md:px-6
           z-50
           backdrop-blur supports-[backdrop-filter]:bg-white/80">

    <!-- LEFT -->
    <div class="flex items-center gap-4">
        <!-- Toggle Sidebar -->
        <button
            id="sidebarToggle"
            class="md:hidden inline-flex items-center justify-center
                   w-10 h-10 rounded-xl
                   text-gray-600 hover:text-gray-900
                   hover:bg-gray-100 transition
                   focus:outline-none focus:ring-2 focus:ring-blue-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Title -->
        <div class="flex flex-col leading-tight">
            <span class="text-xs text-gray-400 tracking-wide">
                Admin Panel
            </span>
            <span class="text-sm sm:text-base font-semibold text-gray-800">
                Sistem Pengaduan
            </span>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="flex items-center gap-3 sm:gap-4">

        <!-- Admin Name -->
        <div class="hidden sm:flex items-center gap-2">
            <div
                class="w-8 h-8 rounded-full bg-blue-100
                       flex items-center justify-center
                       text-blue-600 font-semibold text-sm">
                A
            </div>
            <span class="text-sm text-gray-600 font-medium">
                Admin
            </span>
        </div>

        <!-- Divider -->
        <div class="hidden sm:block w-px h-6 bg-gray-200"></div>

        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button
                class="inline-flex items-center justify-center
                       w-10 h-10 rounded-xl
                       text-gray-500 hover:text-red-600
                       hover:bg-red-50 transition
                       focus:outline-none focus:ring-2 focus:ring-red-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M10 17l5-5m0 0l-5-5m5 5H3" />
                </svg>
            </button>
        </form>

    </div>
</header>
