<aside id="sidebar"
    class="fixed top-14 left-0 w-64 h-[calc(100vh-3.5rem)] bg-white border-r border-gray-200
           transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-40">

    <nav class="px-4 py-6 space-y-1 text-sm">

        <a href="{{ url('/admin/dashboard') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 transition">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.8"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 12l9-9 9 9M4.5 10.5V20a1 1 0 001 1h4.5v-6h4v6H18.5a1 1 0 001-1v-9.5" />
            </svg>
            Dashboard
        </a>

        <a href="{{ url('/admin/pengaduan') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 transition">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.8"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7.5 8h9m-9 4h5m-6 8l-4.5-4.5A2.25 2.25 0 013 13.5V6.75A2.25 2.25 0 015.25 4.5h13.5A2.25 2.25 0 0121 6.75v6.75a2.25 2.25 0 01-2.25 2.25H10.5L7.5 20z" />
            </svg>
            Pengaduan
        </a>
        
        <a href="{{ url('admin/pengaduan') }}"
        class="flex items-center gap-3 px-4 py-2 rounded-md text-gray-50 hover:gray-100 transform-border"
            ></a>


        {{-- <a href="{{ url('/admin/pengaduan?status=diproses') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 transition">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.8"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z" />
            </svg>
            Diproses
        </a>

        <a href="{{ url('/admin/pengaduan?status=selesai') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 transition">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.8"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12l2 2 4-4m7 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Selesai
        </a> --}}

    </nav>
</aside>
