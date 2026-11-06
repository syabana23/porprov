<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - Pandu Porprov</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script nonce="{{ $cspNonce ?? '' }}" src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gradient-to-br from-[#032f7c] to-[#0649b6] min-h-screen flex items-center justify-center font-[Poppins]">
    <div class="w-full max-w-md mx-4">
        <div class="bg-white rounded-2xl shadow-2xl p-6 sm:p-8">
            <div class="text-center mb-8">
                <img src="{{ asset('images/logo_baru.PNG') }}" class="h-16 mx-auto mb-4" alt="Logo">
                <h1 class="text-2xl font-semibold text-[#102446]">Masuk Admin</h1>
                <p class="text-sm text-gray-500 mt-1">Panel Pengelolaan Pandu Porprov</p>
            </div>
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" placeholder="••••••••" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <button type="submit" style="background-color: #0b3b7a !important; color: #ffffff !important; border: none !important;" class="w-full inline-flex items-center justify-center bg-[#0b3b7a] hover:bg-[#072a59] text-white py-3 rounded-xl font-bold text-sm shadow-md transition-all cursor-pointer">
                    Masuk
                </button>
            </form>
        </div>
    </div>
</body>
</html>
