@extends('admin.layout.app')

@section('title', 'Dashboard Admin')

@section('content')

<!-- ====== HEADER DASHBOARD ====== -->
<div class="mb-6 animate-fadeInDown pt-16">
    <h1 class="text-3xl font-bold text-gray-800 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
        Dashboard Admin
    </h1>
    <p class="text-sm text-gray-500 mt-2">
        Ringkasan data pengaduan masyarakat secara keseluruhan
    </p>
</div>

<!-- ====== STAT CARDS ====== -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">

    <!-- TOTAL -->
    <div class="stat-card bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg hover:shadow-2xl p-6 transform hover:-translate-y-2 hover:scale-105 transition-all duration-300 cursor-pointer group overflow-hidden relative"
         style="animation: slideInUp 0.5s ease-out;">
        <div class="flex items-center justify-between relative z-10">
            <div>
                <p class="text-sm text-white/80 font-medium">Total Pengaduan</p>
                <p class="text-5xl font-bold text-white mt-2">
                    <span class="counter" data-target="{{ $total ?? 0 }}">0</span>
                </p>
                <p class="text-xs text-white/70 mt-3">
                    Seluruh laporan yang masuk
                </p>
            </div>
            <div class="w-16 h-16 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center group-hover:scale-110 group-hover:rotate-12 transition-transform duration-300">
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
        <!-- Decorative elements -->
        <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-white/10 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
        <div class="absolute top-0 right-0 w-20 h-20 bg-white/5 rounded-full -mr-10 -mt-10"></div>
    </div>

    <!-- DIPROSES -->
    <div class="stat-card bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl shadow-lg hover:shadow-2xl p-6 transform hover:-translate-y-2 hover:scale-105 transition-all duration-300 cursor-pointer group overflow-hidden relative"
         style="animation: slideInUp 0.5s ease-out 0.1s backwards;">
        <div class="flex items-center justify-between relative z-10">
            <div>
                <p class="text-sm text-white/80 font-medium">Sedang Diproses</p>
                <p class="text-5xl font-bold text-white mt-2">
                    <span class="counter" data-target="{{ $diproses ?? 0 }}">0</span>
                </p>
                <p class="text-xs text-white/70 mt-3">
                    Laporan dalam penanganan
                </p>
            </div>
            <div class="w-16 h-16 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center group-hover:scale-110 group-hover:rotate-12 transition-transform duration-300">
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
        <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-white/10 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
        <div class="absolute top-0 right-0 w-20 h-20 bg-white/5 rounded-full -mr-10 -mt-10"></div>
    </div>

    <!-- SELESAI -->
    <div class="stat-card bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg hover:shadow-2xl p-6 transform hover:-translate-y-2 hover:scale-105 transition-all duration-300 cursor-pointer group overflow-hidden relative"
         style="animation: slideInUp 0.5s ease-out 0.2s backwards;">
        <div class="flex items-center justify-between relative z-10">
            <div>
                <p class="text-sm text-white/80 font-medium">Selesai</p>
                <p class="text-5xl font-bold text-white mt-2">
                    <span class="counter" data-target="{{ $selesai ?? 0 }}">0</span>
                </p>
                <p class="text-xs text-white/70 mt-3">
                    Pengaduan telah dituntaskan
                </p>
            </div>
            <div class="w-16 h-16 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center group-hover:scale-110 group-hover:rotate-12 transition-transform duration-300">
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
        <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-white/10 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
        <div class="absolute top-0 right-0 w-20 h-20 bg-white/5 rounded-full -mr-10 -mt-10"></div>
    </div>

</div>

@php
    $totalPengaduan = $total ?? 0;
    $diprosesCount = $diproses ?? 0;
    $selesaiCount = $selesai ?? 0;
    
    // Hitung persentase
    $persenSelesai = $totalPengaduan > 0 ? round(($selesaiCount / $totalPengaduan) * 100) : 0;
    $persenDiproses = $totalPengaduan > 0 ? round(($diprosesCount / $totalPengaduan) * 100) : 0;
    
    // Untuk bar chart width
    $widthTotal = 100;
    $widthDiproses = $totalPengaduan > 0 ? round(($diprosesCount / $totalPengaduan) * 100) : 0;
    $widthSelesai = $totalPengaduan > 0 ? round(($selesaiCount / $totalPengaduan) * 100) : 0;
@endphp

<!-- ====== CHART SECTION ====== -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    <!-- BAR CHART -->
    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl p-6 border border-gray-100 transition-all duration-300"
         style="animation: slideInLeft 0.6s ease-out;">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                </svg>
            </div>
            <h3 class="font-bold text-lg text-gray-800">
                Statistik Pengaduan
            </h3>
        </div>

        <div class="space-y-6">
            <!-- TOTAL -->
            <div class="bar-item group cursor-pointer">
                <div class="flex justify-between text-sm mb-2 font-medium">
                    <span class="text-gray-700 group-hover:text-blue-600 transition-colors">Total</span>
                    <span class="text-gray-800 font-bold counter-small" data-target="{{ $totalPengaduan }}">0</span>
                </div>
                <div class="w-full bg-gray-200 h-4 rounded-full overflow-hidden relative">
                    <div class="bar-fill absolute top-0 left-0 h-full bg-gradient-to-r from-blue-500 to-blue-600 rounded-full transition-all duration-1000 shadow-lg" 
                         style="width: 0%"
                         data-width="{{ $widthTotal }}%">
                        <div class="absolute inset-0 bg-white/30 animate-shimmer"></div>
                    </div>
                </div>
            </div>

            <!-- DIPROSES -->
            <div class="bar-item group cursor-pointer">
                <div class="flex justify-between text-sm mb-2 font-medium">
                    <span class="text-gray-700 group-hover:text-orange-600 transition-colors">Diproses</span>
                    <span class="text-gray-800 font-bold counter-small" data-target="{{ $diprosesCount }}">0</span>
                </div>
                <div class="w-full bg-gray-200 h-4 rounded-full overflow-hidden relative">
                    <div class="bar-fill absolute top-0 left-0 h-full bg-gradient-to-r from-orange-400 to-orange-600 rounded-full transition-all duration-1000 shadow-lg" 
                         style="width: 0%"
                         data-width="{{ $widthDiproses }}%">
                        <div class="absolute inset-0 bg-white/30 animate-shimmer"></div>
                    </div>
                </div>
            </div>

            <!-- SELESAI -->
            <div class="bar-item group cursor-pointer">
                <div class="flex justify-between text-sm mb-2 font-medium">
                    <span class="text-gray-700 group-hover:text-green-600 transition-colors">Selesai</span>
                    <span class="text-gray-800 font-bold counter-small" data-target="{{ $selesaiCount }}">0</span>
                </div>
                <div class="w-full bg-gray-200 h-4 rounded-full overflow-hidden relative">
                    <div class="bar-fill absolute top-0 left-0 h-full bg-gradient-to-r from-green-400 to-green-600 rounded-full transition-all duration-1000 shadow-lg" 
                         style="width: 0%"
                         data-width="{{ $widthSelesai }}%">
                        <div class="absolute inset-0 bg-white/30 animate-shimmer"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 pt-4 border-t border-gray-200 text-center">
            <p class="text-xs text-gray-500">Hover untuk melihat detail statistik</p>
        </div>
    </div>

    <!-- DONUT CHART -->
    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl p-6 border border-gray-100 flex flex-col items-center transition-all duration-300"
         style="animation: slideInRight 0.6s ease-out;">
        <div class="flex items-center gap-3 mb-6 w-full">
            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-pink-400 to-pink-600 flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <h3 class="font-bold text-lg text-gray-800">
                Persentase Status
            </h3>
        </div>

        <div class="relative mb-6 donut-container">
            <svg width="200" height="200" viewBox="0 0 42 42" class="donut-chart transform -rotate-90">
                <!-- background -->
                <circle cx="21" cy="21" r="15.915" fill="transparent" stroke="#e5e7eb" stroke-width="5" />
                
                <!-- selesai (hijau) -->
                <circle class="donut-segment donut-selesai" 
                        cx="21" cy="21" r="15.915" 
                        fill="transparent"
                        stroke="url(#greenGradient)" 
                        stroke-width="5"
                        stroke-dasharray="0 100"
                        stroke-dashoffset="0"
                        data-percentage="{{ $persenSelesai }}"
                        style="transition: stroke-dasharray 1.5s ease-out 0.3s;" />
                
                <!-- diproses (orange) -->
                <circle class="donut-segment donut-proses" 
                        cx="21" cy="21" r="15.915" 
                        fill="transparent"
                        stroke="url(#orangeGradient)" 
                        stroke-width="5"
                        stroke-dasharray="0 100"
                        stroke-dashoffset="-{{ $persenSelesai }}"
                        data-percentage="{{ $persenDiproses }}"
                        style="transition: stroke-dasharray 1.5s ease-out 0.6s;" />

                <!-- Gradients -->
                <defs>
                    <linearGradient id="greenGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#22c55e;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#16a34a;stop-opacity:1" />
                    </linearGradient>
                    <linearGradient id="orangeGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#f97316;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#ea580c;stop-opacity:1" />
                    </linearGradient>
                </defs>
            </svg>

            <!-- Center text -->
            <div class="absolute inset-0 flex flex-col items-center justify-center">
                <p class="text-4xl font-bold bg-gradient-to-r from-green-600 to-orange-600 bg-clip-text text-transparent counter-donut" data-target="{{ $totalPengaduan }}">0</p>
                <p class="text-sm text-gray-600 font-medium mt-1">Total</p>
            </div>
        </div>

        <!-- Legend dengan animasi -->
        <div class="w-full max-w-xs space-y-3">
            <div class="legend-item flex items-center justify-between p-3 bg-green-50 hover:bg-gradient-to-r hover:from-green-500 hover:to-green-600 rounded-lg cursor-pointer transition-all duration-300 group"
                 style="animation: fadeInUp 0.5s ease-out 0.8s backwards;">
                <div class="flex items-center gap-3">
                    <div class="w-4 h-4 bg-green-500 group-hover:bg-white rounded-full transition-colors duration-300 legend-dot"></div>
                    <span class="font-semibold text-gray-700 group-hover:text-white transition-colors duration-300">Selesai</span>
                </div>
                <div class="text-right">
                    <p class="font-bold text-green-600 group-hover:text-white transition-colors duration-300">
                        <span class="counter-legend" data-target="{{ $selesaiCount }}">0</span>
                    </p>
                    <p class="text-xs text-gray-600 group-hover:text-white/90 font-medium transition-colors duration-300">
                        <span class="percentage-counter" data-target="{{ $persenSelesai }}">0</span>%
                    </p>
                </div>
            </div>

            <div class="legend-item flex items-center justify-between p-3 bg-orange-50 hover:bg-gradient-to-r hover:from-orange-400 hover:to-orange-600 rounded-lg cursor-pointer transition-all duration-300 group"
                 style="animation: fadeInUp 0.5s ease-out 1s backwards;">
                <div class="flex items-center gap-3">
                    <div class="w-4 h-4 bg-orange-500 group-hover:bg-white rounded-full transition-colors duration-300 legend-dot"></div>
                    <span class="font-semibold text-gray-700 group-hover:text-white transition-colors duration-300">Diproses</span>
                </div>
                <div class="text-right">
                    <p class="font-bold text-orange-600 group-hover:text-white transition-colors duration-300">
                        <span class="counter-legend" data-target="{{ $diprosesCount }}">0</span>
                    </p>
                    <p class="text-xs text-gray-600 group-hover:text-white/90 font-medium transition-colors duration-300">
                        <span class="percentage-counter" data-target="{{ $persenDiproses }}">0</span>%
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-6 pt-4 border-t border-gray-200 text-center w-full">
            <p class="text-xs text-gray-500">Klik pada legend untuk melihat detail</p>
        </div>
    </div>

</div>

<!-- ====== CUSTOM CSS & JAVASCRIPT ====== -->
<style>
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-100%);
        }
        100% {
            transform: translateX(100%);
        }
    }

    .animate-shimmer {
        animation: shimmer 2s infinite;
    }

    .animate-fadeInDown {
        animation: fadeInDown 0.6s ease-out;
    }

    .bar-item:hover .bar-fill {
        filter: brightness(1.1);
        transform: scaleY(1.1);
    }

    .legend-dot {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: .7;
        }
    }

    .donut-segment {
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .donut-segment:hover {
        stroke-width: 6;
        filter: brightness(1.1);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // ============ COUNTER ANIMATION ============
    function animateCounter(element, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16);
        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                element.textContent = Math.floor(target);
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(start);
            }
        }, 16);
    }

    // Animate all counters
    setTimeout(() => {
        document.querySelectorAll('.counter').forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            animateCounter(counter, target, 2000);
        });

        document.querySelectorAll('.counter-small').forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            animateCounter(counter, target, 1500);
        });

        document.querySelectorAll('.counter-legend').forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            animateCounter(counter, target, 1800);
        });

        document.querySelectorAll('.percentage-counter').forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            animateCounter(counter, target, 1800);
        });

        document.querySelectorAll('.counter-donut').forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            animateCounter(counter, target, 2000);
        });
    }, 300);

    // ============ BAR CHART ANIMATION ============
    setTimeout(() => {
        document.querySelectorAll('.bar-fill').forEach((bar, index) => {
            setTimeout(() => {
                const width = bar.getAttribute('data-width');
                bar.style.width = width;
            }, index * 200);
        });
    }, 500);

    // ============ DONUT CHART ANIMATION ============
    setTimeout(() => {
        const selesaiSegment = document.querySelector('.donut-selesai');
        const prosesSegment = document.querySelector('.donut-proses');
        
        if (selesaiSegment) {
            const percentage = parseInt(selesaiSegment.getAttribute('data-percentage'));
            selesaiSegment.setAttribute('stroke-dasharray', `${percentage} ${100 - percentage}`);
        }
        
        if (prosesSegment) {
            const percentage = parseInt(prosesSegment.getAttribute('data-percentage'));
            prosesSegment.setAttribute('stroke-dasharray', `${percentage} ${100 - percentage}`);
        }
    }, 800);

    // ============ INTERACTIVE HOVER EFFECTS ============
    
    // Stat cards hover effect
    document.querySelectorAll('.stat-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Legend item click effect
    document.querySelectorAll('.legend-item').forEach(item => {
        item.addEventListener('click', function() {
            // Add pulse animation
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });
    });

    // Donut segment interactive
    document.querySelectorAll('.donut-segment').forEach(segment => {
        segment.addEventListener('mouseenter', function() {
            this.style.strokeWidth = '6';
            this.style.filter = 'brightness(1.2)';
        });
        segment.addEventListener('mouseleave', function() {
            this.style.strokeWidth = '5';
            this.style.filter = 'brightness(1)';
        });
    });

    // Bar item click to show detail
    document.querySelectorAll('.bar-item').forEach(item => {
        item.addEventListener('click', function() {
            const label = this.querySelector('span').textContent;
            const value = this.querySelector('.counter-small').textContent;
            
            // Create temporary tooltip
            const tooltip = document.createElement('div');
            tooltip.className = 'fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-gray-800 text-white px-6 py-3 rounded-lg shadow-2xl z-50';
            tooltip.textContent = `${label}: ${value} pengaduan`;
            tooltip.style.animation = 'fadeInUp 0.3s ease-out';
            document.body.appendChild(tooltip);
            
            setTimeout(() => {
                tooltip.style.animation = 'fadeInDown 0.3s ease-out reverse';
                setTimeout(() => {
                    document.body.removeChild(tooltip);
                }, 300);
            }, 2000);
        });
    });

});
</script>

@endsection