<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pengaduan Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #fce4ec 0%, #f8bbd9 100%);
        }
    </style>
</head>
<body class="min-h-screen">
    <div class="container mx-auto p-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-pink-700 mb-4">Dashboard</h1>
            <p class="text-lg text-pink-600">Selamat datang, {{ Auth::user()->nama }}!</p>
            <p class="text-pink-500 mt-2">Role Anda: {{ Auth::user()->role }}</p>
            <div class="mt-6">
                <a href="{{ route('logout') }}" class="bg-pink-500 text-white px-4 py-2 rounded-md hover:bg-pink-600 transition duration-200">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>