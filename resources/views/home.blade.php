<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Pengaduan Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #fce4ec 0%, #f8bbd9 70%, #fef1f6 100%);
        }
    </style>
</head>
<body class="min-h-screen text-slate-900">
    <div class="min-h-screen flex flex-col">
        <header class="px-6 py-6 md:px-10 bg-white/80 backdrop-blur-sm border-b border-pink-200 shadow-sm">
            <div class="mx-auto flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between max-w-7xl">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-pink-500 font-semibold">Sistem Pengaduan Siswa</p>
                    <h1 class="mt-3 text-4xl md:text-5xl font-extrabold text-slate-900">Selamat datang di platform layanan pengaduan.</h1>
                    <p class="mt-4 max-w-2xl text-slate-600 text-lg">Kelola laporan dengan mudah, pantau status, dan bantu siswa menyampaikan aspirasi secara tertib.</p>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row items-start sm:items-center">
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-full bg-pink-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-pink-200/60 transition hover:bg-pink-600">Masuk</a>
                </div>
            </div>
        </header>

        <main class="flex-1 px-6 py-10 md:px-10 mx-auto max-w-7xl">
            <div class="grid gap-6 lg:grid-cols-[0.9fr_0.7fr]">
                <section class="rounded-[32px] bg-white/90 border border-pink-100 p-8 shadow-[0_20px_60px_-40px_rgba(236,72,153,0.5)]">
                    <div class="flex items-center justify-between gap-4 mb-6">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-pink-500">Highlight</p>
                            <h2 class="mt-3 text-2xl font-bold text-slate-900">Kirim laporanmu sekarang</h2>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-pink-100 px-4 py-2 text-sm font-medium text-pink-700">Gratis & Aman</span>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2">
                        <article class="rounded-3xl border border-pink-200 bg-pink-50 p-6">
                            <h3 class="text-lg font-semibold text-slate-900">Mudah diakses</h3>
                            <p class="mt-3 text-slate-600">Akses fitur pengaduan kapan saja dari perangkat apa pun.</p>
                        </article>
                        <article class="rounded-3xl border border-pink-200 bg-white p-6 shadow-sm">
                            <h3 class="text-lg font-semibold text-slate-900">Tampilan nyaman</h3>
                            <p class="mt-3 text-slate-600">Desain pastel yang lembut memudahkan penggunaan untuk semua kalangan.</p>
                        </article>
                        <article class="rounded-3xl border border-pink-200 bg-white p-6 shadow-sm">
                            <h3 class="text-lg font-semibold text-slate-900">Pemantauan status</h3>
                            <p class="mt-3 text-slate-600">Ketahui progres laporan secara real-time.</p>
                        </article>
                        <article class="rounded-3xl border border-pink-200 bg-pink-50 p-6">
                            <h3 class="text-lg font-semibold text-slate-900">Aman dan terstruktur</h3>
                            <p class="mt-3 text-slate-600">Setiap pengaduan tersimpan dengan rapi dan mudah dikelola.</p>
                        </article>
                    </div>
                </section>

                <aside class="space-y-6">
                    <div class="rounded-[32px] bg-white/95 border border-pink-200 p-8 shadow-sm">
                        <h3 class="text-xl font-semibold text-slate-900">Kenapa gunakan layanan ini?</h3>
                        <ul class="mt-6 space-y-4 text-slate-600">
                            <li class="rounded-3xl border border-pink-100 bg-pink-50 p-4">
                                <p class="font-semibold text-slate-900">Respons cepat</p>
                                <p class="mt-1 text-sm">Admin dan petugas dapat menindaklanjuti laporan lebih cepat.</p>
                            </li>
                            <li class="rounded-3xl border border-pink-100 bg-white p-4">
                                <p class="font-semibold text-slate-900">Data terkelola</p>
                                <p class="mt-1 text-sm">Semua laporan disimpan rapi untuk referensi dan pelaporan.</p>
                            </li>
                            <li class="rounded-3xl border border-pink-100 bg-pink-50 p-4">
                                <p class="font-semibold text-slate-900">Ramah pengguna</p>
                                <p class="mt-1 text-sm">Antarmuka sederhana cocok untuk guru, siswa, dan petugas.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="rounded-[32px] bg-gradient-to-br from-pink-50 to-white border border-pink-200 p-8 shadow-sm">
                        <h3 class="text-xl font-semibold text-slate-900">Info singkat</h3>
                        <p class="mt-4 text-slate-600">Halaman beranda ini menggantikan tampilan welcome default Laravel dan memberi kesan profesional menggunakan warna pink pastel lembut.</p>
                    </div>
                </aside>
            </div>
        </main>

        <footer class="px-6 py-6 md:px-10 bg-white/80 border-t border-pink-200 text-slate-600 text-sm">
            <div class="mx-auto max-w-7xl flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                <p>© {{ date('Y') }} Pengaduan Siswa. Semua hak dilindungi.</p>
                <a href="{{ route('login') }}" class="text-pink-600 font-semibold hover:text-pink-700">Masuk ke sistem</a>
            </div>
        </footer>
    </div>
</body>
</html>