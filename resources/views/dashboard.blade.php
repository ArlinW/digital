<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pengaduan Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #fde8f0 0%, #f9d5e3 45%, #f8bbd9 100%);
        }
    </style>
</head>
<body class="min-h-screen text-slate-800">
    <div class="min-h-screen px-4 py-6 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <header class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between mb-8">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-pink-500 font-semibold">Selamat datang di</p>
                    <h1 class="text-4xl font-extrabold text-slate-900 sm:text-5xl">Dashboard Pengaduan</h1>
                    <p class="mt-2 text-slate-600 max-w-2xl">Lihat ringkasan aktivitas dan akses cepat ke informasi penting akun Anda.</p>
                </div>
                <div class="rounded-3xl bg-white/80 border border-pink-200 p-4 shadow-sm backdrop-blur-md">
                    <p class="text-sm text-slate-500">Logged in sebagai</p>
                    <p class="mt-1 text-lg font-semibold text-pink-700">{{ Auth::user()->nama }}</p>
                    <p class="text-sm text-slate-500">Role: <span class="font-semibold text-pink-600">{{ Auth::user()->role }}</span></p>
                </div>
            </header>

            <main class="grid gap-6 lg:grid-cols-[1.35fr_0.65fr]">
                <section class="space-y-6">
                    <div class="rounded-[32px] bg-white/90 border border-pink-200 p-8 shadow-[0_25px_50px_-35px_rgba(236,72,153,0.6)]">
                        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                            <div>
                                <p class="text-sm uppercase tracking-[0.25em] text-pink-500 font-medium">Halo</p>
                                <h2 class="mt-2 text-3xl font-bold text-slate-900">{{ Auth::user()->nama }}, ayo terus berkontribusi!</h2>
                                <p class="mt-3 text-slate-600 max-w-xl">Gunakan dashboard ini untuk mengelola laporan pengaduan siswa dan memantau statusnya dengan mudah.</p>
                            </div>
                            <div class="rounded-3xl bg-pink-50 p-4 text-center border border-pink-100">
                                <p class="text-sm text-slate-500">Status akun</p>
                                <p class="mt-2 text-2xl font-semibold text-pink-700">Aktif</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <article class="rounded-3xl bg-white border border-pink-200 p-6 shadow-sm">
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-pink-500 font-semibold uppercase">Total Pengaduan</p>
                                <span class="inline-flex items-center rounded-full bg-pink-100 px-3 py-1 text-sm font-medium text-pink-700">Baru</span>
                            </div>
                            <p class="mt-6 text-4xl font-bold text-slate-900">12</p>
                            <p class="mt-3 text-sm text-slate-500">Jumlah laporan yang masuk sampai saat ini.</p>
                        </article>
                        <article class="rounded-3xl bg-white border border-pink-200 p-6 shadow-sm">
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-pink-500 font-semibold uppercase">Pengaduan Diproses</p>
                                <span class="inline-flex items-center rounded-full bg-pink-100 px-3 py-1 text-sm font-medium text-pink-700">Sedang</span>
                            </div>
                            <p class="mt-6 text-4xl font-bold text-slate-900">5</p>
                            <p class="mt-3 text-sm text-slate-500">Laporan yang sedang ditindaklanjuti.</p>
                        </article>
                    </div>

                    <div class="rounded-[32px] bg-white border border-pink-200 p-8 shadow-sm">
                        <h3 class="text-xl font-semibold text-slate-900">Catatan singkat</h3>
                        <p class="mt-4 text-slate-600">Dashboard ini dibuat untuk membantu Anda melihat status laporan dengan cepat. Ketuk tombol di bawah untuk kembali ke halaman utama atau menambahkan pengaduan baru jika diperlukan.</p>
                        <div class="mt-6 flex flex-col gap-3 sm:flex-row">git
                            <a href="/dashboard" class="inline-flex items-center justify-center rounded-full border border-pink-200 bg-white px-5 py-3 text-sm font-semibold text-pink-700 transition hover:bg-pink-50">Segarkan Dashboard</a>
                        </div>
                    </div>
                </section>

                <aside class="space-y-6">
                    <div class="rounded-[32px] bg-white border border-pink-200 p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm uppercase tracking-[0.2em] text-pink-500 font-semibold">Info Akun</p>
                                <h3 class="mt-3 text-2xl font-bold text-slate-900">{{ Auth::user()->username }}</h3>
                            </div>
                        </div>
                        <div class="mt-6 space-y-3 text-slate-600">
                            <div class="rounded-2xl bg-pink-50 p-4">
                                <p class="text-sm text-slate-500">Nama lengkap</p>
                                <p class="mt-1 font-semibold text-slate-900">{{ Auth::user()->nama }}</p>
                            </div>
                            <div class="rounded-2xl bg-pink-50 p-4">
                                <p class="text-sm text-slate-500">Role</p>
                                <p class="mt-1 font-semibold text-slate-900">{{ Auth::user()->role }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[32px] bg-gradient-to-br from-pink-100 to-pink-50 border border-pink-200 p-6 shadow-sm">
                        <h3 class="text-xl font-semibold text-slate-900">Tips cepat</h3>
                        <ul class="mt-4 space-y-3 text-slate-600">
                            <li class="rounded-2xl bg-white/80 p-4">Gunakan username Anda untuk login setiap saat.</li>
                            <li class="rounded-2xl bg-white/80 p-4">Pastikan laporan berisi detail yang jelas.</li>
                            <li class="rounded-2xl bg-white/80 p-4">Periksa kembali status laporan secara berkala.</li>
                        </ul>
                    </div>

                    <div class="rounded-[32px] bg-white border border-pink-200 p-6 shadow-sm">
                        <p class="text-sm text-pink-500 uppercase tracking-[0.2em] font-semibold">Aksi</p>
                        <div class="mt-6">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full rounded-full bg-pink-500 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-pink-600">Logout</button>
                            </form>
                        </div>
                    </div>
                </aside>
            </main>
        </div>
    </div>
</body>
</html>