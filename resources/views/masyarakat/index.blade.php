@extends('masyarakat.layout.app')

@section('title', 'Beranda')

@section('content')
    <div class="max-w-6xl mx-auto px-0 py-12">

        <!-- HERO -->
        <div class="text-center mb-20 space-y-6 px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800">
                Laporkan Masalah di Lingkungan Anda
            </h1>

            <p class="text-gray-600 text-lg md:text-xl max-w-3xl mx-auto">
                Jalan rusak, lampu mati, atau layanan publik bermasalah?
                Sampaikan laporan Anda secara cepat dan transparan.
            </p>
        </div>

        <!-- IMAGE + CONTENT -->
        <div class="max-w-4xl mx-auto text-center">

            <!-- IMAGE SLIDER -->
            <div class="relative overflow-hidden w-full h-[450px] bg-black">

                <!-- CURRENT -->
                <img id="imgA"
                    src="{{ asset('img/pengduan_masyarakat/ombudsman-on-the-spot-di-gorontalo-1kqc5-dom.webp') }}"
                    class="absolute inset-0 w-full h-full object-cover" alt="" />

                <!-- NEXT -->
                <img id="imgB" class="absolute inset-0 w-full h-full object-cover" style="transform: translateX(100%)"
                    alt="" />
            </div>

            <!-- TEXT -->
            <div class="space-y-6 mt-12 px-4">
                <p class="font-mono text-sm text-blue-500 uppercase tracking-widest">
                    Cepat • Transparan • Mudah
                </p>

                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                    Sistem Pengaduan Online
                </h2>

                <p class="text-gray-600 text-lg leading-relaxed max-w-3xl mx-auto">
                    Sistem ini dirancang untuk memudahkan masyarakat dalam
                    menyampaikan laporan secara online tanpa harus datang ke kantor desa.
                    Semua laporan tercatat dan dapat dipantau statusnya secara real-time.
                </p>
                <div class="mt-8 flex justify-center">
    <a href="{{ route('masyarakat.pengaduan.create') }}"
       class="inline-flex items-center gap-2
              px-7 py-3
              bg-blue-600 text-white
              text-base font-semibold
              rounded-lg
              shadow-md
              transition
              hover:bg-blue-700
              hover:shadow-lg">

        <svg class="w-4 h-4"
             fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 19l9 2-9-18-9 18 9-2z"/>
        </svg>

        <span>Ajukan Pengaduan</span>
    </a>
</div>


            </div>
        </div>

        <!-- BLOG SECTION -->
        <div class="max-w-6xl mx-auto px-4 mt-32 mb-16">
            <!-- Header -->
            <div class="mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                    Berita & Informasi
                </h2>
                <p class="text-gray-600 text-lg">
                    Update terkini seputar pelayanan publik dan pengaduan masyarakat
                </p>
            </div>

            <!-- Blog Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Blog Card 1 -->
                <article class="group cursor-pointer">
                    <div class="overflow-hidden rounded-lg mb-5 h-[280px]">
                        <img src="{{ asset('img/pengduan_masyarakat/ombudsman-on-the-spot-di-gorontalo-1kqc5-dom.webp') }}"
                            alt="Ombudsman On The Spot"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors">
                        Peningkatan Layanan Pengaduan Masyarakat
                    </h3>
                    <p class="text-gray-500 text-sm mb-3">15 Desember 2024</p>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Pemerintah desa terus meningkatkan sistem pengaduan online untuk memberikan pelayanan yang lebih
                        cepat dan transparan kepada masyarakat. Sistem baru memungkinkan tracking real-time...
                    </p>
                    <div class="flex gap-2 flex-wrap">
                        <span class="text-xs text-gray-500">#layanan</span>
                        <span class="text-xs text-gray-500">#pengaduan</span>
                        <span class="text-xs text-gray-500">#digital</span>
                    </div>
                </article>

                <!-- Blog Card 2 -->
                <article class="group cursor-pointer">
                    <div class="overflow-hidden rounded-lg mb-5 h-[280px]">
                        <img src="{{ asset('img/pengduan_masyarakat/pelayanan-publik-terpadu-di-desa-1kwiv-dom.webp') }}"
                            alt="Pelayanan Publik Terpadu"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors">
                        Pelayanan Publik Terpadu Hadir di Desa
                    </h3>
                    <p class="text-gray-500 text-sm mb-3">10 Desember 2024</p>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Launching sistem pelayanan publik terpadu yang memudahkan warga dalam mengakses berbagai layanan
                        administrasi dan pengaduan. Kini semua dapat dilakukan dalam satu platform...
                    </p>
                    <div class="flex gap-2 flex-wrap">
                        <span class="text-xs text-gray-500">#pelayanan</span>
                        <span class="text-xs text-gray-500">#publik</span>
                        <span class="text-xs text-gray-500">#terpadu</span>
                    </div>
                </article>

                <!-- Blog Card 3 -->
                <article class="group cursor-pointer">
                    <div class="overflow-hidden rounded-lg mb-5 h-[280px]">
                        <img src="{{ asset('img/pengduan_masyarakat/ori-jaring-aduan-masyarakat-pesisir-gorontalo-1kac1-dom.webp') }}"
                            alt="Jaring Aduan Masyarakat"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors">
                        Menjaring Aspirasi Masyarakat Pesisir
                    </h3>
                    <p class="text-gray-500 text-sm mb-3">5 Desember 2024</p>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Tim pengaduan turun langsung ke wilayah pesisir untuk menampung keluhan dan aspirasi warga. Kegiatan
                        ini bertujuan memastikan semua suara masyarakat terdengar dan ditindaklanjuti...
                    </p>
                    <div class="flex gap-2 flex-wrap">
                        <span class="text-xs text-gray-500">#aspirasi</span>
                        <span class="text-xs text-gray-500">#masyarakat</span>
                        <span class="text-xs text-gray-500">#pesisir</span>
                    </div>
                </article>

                <!-- Blog Card 4 -->
                <article class="group cursor-pointer">
                    <div class="overflow-hidden rounded-lg mb-5 h-[280px]">
                        <img src="{{ asset('img/pengduan_masyarakat/ombudsman-sidak-perdagangan-beras-di-pasar-induk-beras-cipinang-1jml1-dom.webp') }}"
                            alt="Sidak Perdagangan"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors">
                        Transparansi Penanganan Pengaduan Publik
                    </h3>
                    <p class="text-gray-500 text-sm mb-3">1 Desember 2024</p>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Komitmen pemerintah untuk memberikan transparansi penuh dalam setiap penanganan pengaduan
                        masyarakat. Setiap laporan dapat dipantau progresnya secara online...
                    </p>
                    <div class="flex gap-2 flex-wrap">
                        <span class="text-xs text-gray-500">#transparansi</span>
                        <span class="text-xs text-gray-500">#akuntabilitas</span>
                        <span class="text-xs text-gray-500">#pengawasan</span>
                    </div>
                </article>

            </div>
        </div>

    </div>

    <script>
      


        const images = [
            "{{ asset('img/pengduan_masyarakat/ombudsman-sidak-perdagangan-beras-di-pasar-induk-beras-cipinang-1jml1-dom.webp') }}",
            "{{ asset('img/pengduan_masyarakat/ombudsman-sidak-perdagangan-beras-di-pasar-induk-beras-cipinang-1jml5-dom.webp') }}",
            "{{ asset('img/pengduan_masyarakat/ori-jaring-aduan-masyarakat-pesisir-gorontalo-1kac1-dom.webp') }}",
            "{{ asset('img/pengduan_masyarakat/ori-jaring-aduan-masyarakat-pesisir-gorontalo-1kac5-dom.webp') }}",
            "{{ asset('img/pengduan_masyarakat/pelayanan-publik-terpadu-di-desa-1kwiv-dom.webp') }}"
        ];

        let index = 0;
        let active = true;

        const imgA = document.getElementById('imgA');
        const imgB = document.getElementById('imgB');

        function slide() {
            const nextIndex = (index + 1) % images.length;

            const current = active ? imgA : imgB;
            const next = active ? imgB : imgA;

            next.src = images[nextIndex];

            // reset posisi TANPA animasi
            next.style.transition = 'none';
            next.style.transform = 'translateX(100%)';

            requestAnimationFrame(() => {
                current.style.transition =
                    next.style.transition =
                    'transform 1.1s cubic-bezier(0.22, 1, 0.36, 1)';

                current.style.transform = 'translateX(-100%)';
                next.style.transform = 'translateX(0)';
            });

            setTimeout(() => {
                current.style.transition = 'none';
                current.style.transform = 'translateX(0)';
                active = !active;
                index = nextIndex;
            }, 1100);
        }

        setInterval(slide, 4500);
    </script>
@endsection
