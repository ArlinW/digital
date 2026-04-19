<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #e8f4fd 0%, #d1e7f0 70%, #fefefe 100%);
        }
    </style>
</head>
<body class="min-h-screen text-slate-900">
    <div class="min-h-screen flex flex-col">
        <header class="px-6 py-6 md:px-10 bg-white/80 backdrop-blur-sm border-b border-blue-200 shadow-sm">
            <div class="mx-auto flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between max-w-7xl">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-blue-500 font-semibold">Sistem Pengaduan Siswa</p>
                    <h1 class="mt-3 text-4xl md:text-5xl font-extrabold text-slate-900">Platform Pengaduan Sekolah</h1>
                    <p class="mt-4 max-w-2xl text-slate-600 text-lg">Kirim laporan dan pantau status pengaduan dengan mudah.</p>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row items-start sm:items-center">
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-full bg-blue-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-200/60 transition hover:bg-blue-600">Masuk</a>
                </div>
            </div>
        </header>

        <main class="flex-1 px-6 py-10 md:px-10 mx-auto max-w-7xl">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-slate-900 mb-4">Selamat Datang</h2>
                <p class="text-slate-600 mb-8">Sistem ini memudahkan siswa untuk mengirim pengaduan dan admin untuk mengelola laporan.</p>
                <div class="grid gap-4 md:grid-cols-3 max-w-4xl mx-auto">
                    <div class="rounded-3xl border border-blue-200 bg-white p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-slate-900 mb-2">Kirim Pengaduan</h3>
                        <p class="text-slate-600">Siswa dapat membuat laporan dengan mudah.</p>
                    </div>
                    <div class="rounded-3xl border border-blue-200 bg-white p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-slate-900 mb-2">Pantau Status</h3>
                        <p class="text-slate-600">Lihat progres pengaduan secara real-time.</p>
                    </div>
                    <div class="rounded-3xl border border-blue-200 bg-white p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-slate-900 mb-2">Kelola Laporan</h3>
                        <p class="text-slate-600">Admin dapat mengupdate status dan feedback.</p>
                    </div>
                </div>
            </div>
        </main>

        <footer class="px-6 py-6 md:px-10 bg-white/80 border-t border-blue-200 text-slate-600 text-sm">
            <div class="mx-auto max-w-7xl text-center">
                <p>© {{ date('Y') }} Sistem Pengaduan Siswa</p>
            </div>
        </footer>
    </div>
</body>
</html>