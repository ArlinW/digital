<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 70%, #f0f9ff 100%);
        }
    </style>
</head>
<body class="min-h-screen text-slate-900">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="px-6 py-8 md:px-10 bg-white/70 backdrop-blur-md border-b border-blue-200 shadow-sm">
            <div class="mx-auto max-w-7xl flex items-center justify-between">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-500 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 11.5L12 6l8 5.5v8a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-8z" />
                                <path d="M12 22V12" />
                            </svg>
                        </div>
                        <h1 class="text-2xl md:text-3xl font-bold text-slate-900">Pengaduan Siswa</h1>
                    </div>
                    <p class="text-sm text-slate-600">Platform untuk menyampaikan aspirasi dan laporan</p>
                </div>
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-full bg-blue-500 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-blue-200/60 transition hover:bg-blue-600">
                    Masuk
                </a>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 px-6 py-12 md:px-10 mx-auto max-w-4xl w-full">
            <!-- Hero Section -->
            <section class="mb-12 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Sampaikan Aspirasi Anda</h2>
                <p class="text-lg text-slate-600 mb-8 max-w-2xl mx-auto">Kami mendengarkan. Laporkan masalah, saran, atau keluhan Anda dengan aman dan mudah.</p>
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-full bg-blue-500 px-8 py-3 text-base font-semibold text-white shadow-lg shadow-blue-200/60 transition hover:bg-blue-600">
                    Mulai Sekarang
                </a>
            </section>

            <!-- Features Grid -->
            <section class="grid gap-4 md:grid-cols-3 mb-12">
                <div class="rounded-2xl bg-white/80 border border-blue-100 p-6 shadow-sm">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-100 text-blue-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-900 mb-2">Laporkan Masalah</h3>
                    <p class="text-sm text-slate-600">Jelaskan apa yang ingin Anda sampaikan secara detail.</p>
                </div>

                <div class="rounded-2xl bg-white/80 border border-blue-100 p-6 shadow-sm">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-100 text-blue-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="1" />
                            <path d="M12 5v14M5 12h14" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-900 mb-2">Pantau Status</h3>
                    <p class="text-sm text-slate-600">Lihat perkembangan laporan Anda kapan saja.</p>
                </div>

                <div class="rounded-2xl bg-white/80 border border-blue-100 p-6 shadow-sm">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-100 text-blue-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-slate-900 mb-2">Dapatkan Respons</h3>
                    <p class="text-sm text-slate-600">Admin akan memberikan feedback untuk setiap laporan Anda.</p>
                </div>
            </section>

            <!-- CTA Banner -->
            <section class="rounded-3xl bg-gradient-to-r from-blue-500 to-blue-600 text-white p-8 md:p-12 text-center shadow-lg">
                <h3 class="text-2xl md:text-3xl font-bold mb-4">Baru di sini?</h3>
                <p class="text-blue-100 mb-6 max-w-2xl mx-auto">Login dengan akun Anda untuk mulai menyampaikan aspirasi dan pantau status laporan secara real-time.</p>
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-full bg-white text-blue-600 px-8 py-3 font-semibold transition hover:bg-blue-50">
                    Masuk Sekarang
                </a>
            </section>
        </main>

        <!-- Footer -->
        <footer class="px-6 py-6 md:px-10 bg-white/70 border-t border-blue-200 text-slate-600 text-sm">
            <div class="mx-auto max-w-7xl text-center">
                <p>© {{ date('Y') }} Pengaduan Siswa</p>
            </div>
        </footer>
    </div>
</body>
</html>