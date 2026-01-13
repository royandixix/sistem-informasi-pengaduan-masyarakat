<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin')</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- HEADER -->
    @include('admin.partials.header')

    <!-- SIDEBAR -->
    @include('admin.partials.sidebar')

    <!-- MAIN CONTENT -->
    <main class="pt-16 md:ml-64 px-4 md:px-6 pb-12 min-h-screen">
        @yield('content')
    </main>

    <!-- FOOTER -->
    @include('admin.partials.footer')

    <!-- SIDEBAR TOGGLE SCRIPT -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggle = document.getElementById('sidebarToggle');

        if (toggle && sidebar) {
            toggle.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
            });
        }
    </script>

</body>
</html>
