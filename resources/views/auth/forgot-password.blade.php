<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center py-12 px-4">

    <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Lupa Password</h2>

        @if(session('status'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('status') }}
        </div>
        @endif

        @if(session('error'))
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-200"
                       required autofocus>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Kirim Link Reset Password
            </button>
        </form>

        <p class="mt-4 text-sm text-center text-gray-500">
            Ingat password? 
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login di sini</a>
        </p>
    </div>

</body>
</html>
