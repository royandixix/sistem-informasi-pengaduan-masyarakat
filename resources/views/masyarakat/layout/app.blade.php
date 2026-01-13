<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Pengaduan Masyarakat')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

@include('masyarakat.partials.navbar')

<main class="pt-20 px-4 md:px-8 max-w-7xl mx-auto min-h-screen">
    @yield('content')
</main>

@include('masyarakat.partials.footer')

</body>
</html>
