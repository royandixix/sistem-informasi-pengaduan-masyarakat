<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center py-12 px-4">

    <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Reset Password</h2>

        @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('password.update') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-200"
                       required autofocus>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                <input type="password" name="password"
                       class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-200"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                       class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-200"
                       required>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Reset Password
            </button>
        </form>

        <p class="mt-4 text-sm text-center text-gray-500">
            Ingat password? 
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login di sini</a>
        </p>
    </div>

</body>
</html>
