<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pengaduan Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-3xl bg-blue-100 text-blue-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 11.5L12 6l8 5.5v8a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-8z" />
                <path d="M12 22V12" />
                <path d="M8 6v5M16 6v5" />
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Login Pengaduan Siswa</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-blue-600 font-medium">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required
                       class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('username')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-blue-600 font-medium">Password</label>
                <input type="password" id="password" name="password" required
                       class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-200">
                Login
            </button>
        </form>
    </div>
</body>
</html>