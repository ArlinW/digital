<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pengaduan Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #e8f4fd 0%, #d1e7f0 45%, #b8d8e6 100%);
            background-image:
                radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.2) 0%, transparent 50%),
                url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .school-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23ffffff'%3E%3Cpath d='M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 20px;
        }

        .book-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23ffffff'%3E%3Cpath d='M12 2C9.79 2 8 3.79 8 6v16c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V6c0-2.21-1.79-4-4-4z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 16px;
        }

        .pencil-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23ffffff'%3E%3Cpath d='M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 14px;
        }
    </style>
</head>
<body class="min-h-screen text-slate-800">
    <div class="min-h-screen px-4 py-6 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <header class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between mb-8">
                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-12 h-12 school-icon rounded-full bg-blue-500 shadow-lg"></div>
                    <p class="text-sm uppercase tracking-[0.3em] text-blue-600 font-semibold">Sistem Pengaduan Siswa</p>
                    <h1 class="text-4xl font-extrabold text-slate-900 sm:text-5xl">Dashboard Sekolah</h1>
                    <p class="mt-2 text-slate-600 max-w-2xl">Kelola aspirasi dan pantau status laporan siswa dengan jelas.</p>
                    <div class="absolute -bottom-2 -right-2 w-8 h-8 book-icon rounded-full bg-green-500 shadow-md"></div>
                </div>
                <div class="rounded-3xl bg-white/80 border border-blue-200 p-4 shadow-sm backdrop-blur-md">
                    <p class="text-sm text-slate-500">Logged in sebagai</p>
                    <p class="mt-1 text-lg font-semibold text-blue-700">{{ $user->nama }}</p>
                    <p class="text-sm text-slate-500">Role: <span class="font-semibold text-blue-600">{{ $user->role }}</span></p>
                    <div class="mt-2 flex gap-1">
                        <div class="w-3 h-3 pencil-icon rounded-full bg-orange-400"></div>
                        <div class="w-3 h-3 book-icon rounded-full bg-green-400"></div>
                        <div class="w-3 h-3 school-icon rounded-full bg-blue-400"></div>
                    </div>
                </div>
            </header>

            @if(session('success'))
                <div class="mb-6 rounded-3xl bg-emerald-50 border border-emerald-200 p-5 text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 rounded-3xl bg-red-50 border border-red-200 p-5 text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            <main class="grid gap-6 lg:grid-cols-[1.3fr_0.7fr]">
                <section class="space-y-6">
                    <div class="rounded-[32px] bg-white/90 border border-blue-200 p-8 shadow-[0_25px_50px_-35px_rgba(59,130,246,0.6)]">
                        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                            <div>
                                <p class="text-sm uppercase tracking-[0.25em] text-blue-500 font-medium">Ringkasan</p>
                                <h2 class="mt-2 text-3xl font-bold text-slate-900">{{ $user->role === 'admin' ? 'Kelola Aspirasi Siswa' : 'Laporan Saya' }}</h2>
                                <p class="mt-3 text-slate-600 max-w-xl">{{ $user->role === 'admin' ? 'Tinjau dan ubah status aspirasi siswa tanpa memperlihatkan identitas pelapor.' : 'Tambahkan laporan baru dan lihat statusnya secara pribadi.' }}</p>
                            </div>
                            <div class="rounded-3xl bg-blue-50 p-4 text-center border border-blue-100">
                                <p class="text-sm text-slate-500">Total laporan</p>
                                <p class="mt-2 text-2xl font-semibold text-blue-700">{{ $summary['total'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-3">
                        <article class="rounded-3xl bg-white border border-blue-200 p-6 shadow-sm">
                            <p class="text-sm text-blue-500 font-semibold uppercase">Menunggu</p>
                            <p class="mt-6 text-4xl font-bold text-slate-900">{{ $summary['pending'] }}</p>
                            <p class="mt-3 text-sm text-slate-500">Laporan yang masih menunggu tindak lanjut.</p>
                        </article>
                        <article class="rounded-3xl bg-white border border-blue-200 p-6 shadow-sm">
                            <p class="text-sm text-blue-500 font-semibold uppercase">Proses</p>
                            <p class="mt-6 text-4xl font-bold text-slate-900">{{ $summary['diproses'] }}</p>
                            <p class="mt-3 text-sm text-slate-500">Laporan yang sedang ditindaklanjuti.</p>
                        </article>
                        <article class="rounded-3xl bg-white border border-blue-200 p-6 shadow-sm">
                            <p class="text-sm text-blue-500 font-semibold uppercase">Selesai</p>
                            <p class="mt-6 text-4xl font-bold text-slate-900">{{ $summary['selesai'] }}</p>
                            <p class="mt-3 text-sm text-slate-500">Laporan yang sudah ditutup oleh admin.</p>
                        </article>
                    </div>

                    @if($user->role !== 'admin')
                        <div class="rounded-[32px] bg-white border border-blue-200 p-8 shadow-sm">
                            <h3 class="text-xl font-semibold text-slate-900">Buat Laporan Baru</h3>
                            <p class="mt-3 text-slate-600">Isi informasi pengaduanmu secara jelas agar admin dapat menindaklanjuti dengan cepat.</p>

                            <form class="mt-6 space-y-6" method="POST" action="{{ route('pengaduan.store') }}">
                                @csrf
                                <div>
                                    <label class="block text-sm font-medium text-slate-700">Lokasi</label>
                                    <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="mt-2 w-full rounded-3xl border border-blue-200 bg-blue-50 px-4 py-3 text-slate-900 focus:border-blue-400 focus:outline-none" required>
                                    @error('lokasi')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700">Keterangan Masalah</label>
                                    <textarea name="keterangan" rows="3" class="mt-2 w-full rounded-3xl border border-blue-200 bg-blue-50 px-4 py-3 text-slate-900 focus:border-blue-400 focus:outline-none" required>{{ old('keterangan') }}</textarea>
                                    @error('keterangan')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700">Detail Laporan</label>
                                    <textarea name="isi_laporan" rows="4" class="mt-2 w-full rounded-3xl border border-blue-200 bg-blue-50 px-4 py-3 text-slate-900 focus:border-blue-400 focus:outline-none" required>{{ old('isi_laporan') }}</textarea>
                                    @error('isi_laporan')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700">Foto (opsional)</label>
                                    <input type="text" name="foto" value="{{ old('foto') }}" placeholder="URL atau nama file" class="mt-2 w-full rounded-3xl border border-blue-200 bg-blue-50 px-4 py-3 text-slate-900 focus:border-blue-400 focus:outline-none">
                                    @error('foto')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                                </div>
                                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-blue-500 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-600">Kirim Laporan</button>
                            </form>
                        </div>
                    @endif

                    <div class="rounded-[32px] bg-white border border-blue-200 p-8 shadow-sm">
                        <h3 class="text-xl font-semibold text-slate-900">{{ $user->role === 'admin' ? 'Kelola Aspirasi' : 'Daftar Laporan Anda' }}</h3>
                        <p class="mt-3 text-slate-600">{{ $user->role === 'admin' ? 'Admin hanya melihat aspirasi dengan identitas anonim untuk menjaga privasi siswa.' : 'Hanya laporan Anda sendiri yang tampil di halaman ini.' }}</p>

                        <div class="mt-6 overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-200 text-sm text-slate-700">
                                <thead>
                                    <tr class="bg-blue-50 text-left text-slate-600 uppercase tracking-[0.16em]">
                                        <th class="px-4 py-3">No</th>
                                        <th class="px-4 py-3">Lokasi</th>
                                        <th class="px-4 py-3">Keterangan</th>
                                        <th class="px-4 py-3">Status</th>
                                        <th class="px-4 py-3">Tanggal</th>
                                        @if($user->role === 'admin')
                                            <th class="px-4 py-3">Feedback</th>
                                        @endif
                                        <th class="px-4 py-3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200 bg-white">
                                    @php
                                        $items = $user->role === 'admin' ? $aspirasi : $reports;
                                        $statusLabel = ['pending' => 'Menunggu', 'diproses' => 'Proses', 'selesai' => 'Selesai'];
                                        $statusStyle = [
                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                            'diproses' => 'bg-blue-100 text-blue-800',
                                            'selesai' => 'bg-emerald-100 text-emerald-800',
                                        ];
                                    @endphp
                                    @forelse($items as $index => $item)
                                        <tr>
                                            <td class="px-4 py-4 font-semibold text-slate-900">{{ $index + 1 }}</td>
                                            <td class="px-4 py-4">
                                                <div class="font-semibold">{{ $item->lokasi }}</div>
                                                @if($user->role === 'admin')
                                                    <div class="mt-1 text-xs uppercase tracking-[0.22em] text-slate-500">Pelapor: Anonim</div>
                                                @endif
                                            </td>
                                            <td class="px-4 py-4">
                                                <div class="max-w-xs truncate" title="{{ $item->keterangan }}">{{ $item->keterangan }}</div>
                                            </td>
                                            <td class="px-4 py-4">
                                                <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $statusStyle[$item->status] }}">{{ $statusLabel[$item->status] }}</span>
                                            </td>
                                            <td class="px-4 py-4 text-slate-600">{{ $item->tanggal_lapor->format('d M Y') }}</td>
                                            @if($user->role === 'admin')
                                                <td class="px-4 py-4">
                                                    <form method="POST" action="{{ route('pengaduan.feedback', $item) }}" class="flex gap-2">
                                                        @csrf
                                                        @method('PATCH')
                                                        <textarea name="feedback" rows="2" class="w-32 text-xs rounded border border-slate-300 px-2 py-1" placeholder="Feedback...">{{ $item->feedback }}</textarea>
                                                        <button type="submit" class="rounded bg-blue-500 px-2 py-1 text-xs font-semibold text-white transition hover:bg-blue-600">Simpan</button>
                                                    </form>
                                                </td>
                                            @endif
                                            <td class="px-4 py-4">
                                                @if($user->role === 'admin')
                                                    <div class="flex flex-col gap-2">
                                                        <form method="POST" action="{{ route('pengaduan.status', $item) }}" class="flex gap-2">
                                                            @csrf
                                                            @method('PATCH')
                                                            @if($item->status === 'pending')
                                                                <input type="hidden" name="status" value="diproses">
                                                                <button type="submit" class="rounded-full bg-blue-500 px-3 py-1 text-xs font-semibold text-white transition hover:bg-blue-600">Proses</button>
                                                            @elseif($item->status === 'diproses')
                                                                <input type="hidden" name="status" value="selesai">
                                                                <button type="submit" class="rounded-full bg-emerald-500 px-3 py-1 text-xs font-semibold text-white transition hover:bg-emerald-600">Selesai</button>
                                                            @else
                                                                <span class="rounded-full bg-slate-100 px-2 py-1 text-xs font-semibold text-slate-600">Selesai</span>
                                                            @endif
                                                        </form>
                                                        @if($item->status === 'selesai')
                                                            <form method="POST" action="{{ route('pengaduan.destroy', $item) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus aspirasi ini?')" class="inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="rounded-full bg-red-500 px-3 py-1 text-xs font-semibold text-white transition hover:bg-red-600">Hapus</button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                @else
                                                    @if($item->feedback)
                                                        <div class="rounded bg-blue-50 p-2 text-xs text-blue-800">
                                                            <strong>Feedback:</strong> {{ $item->feedback }}
                                                        </div>
                                                    @else
                                                        <span class="text-sm text-slate-500">Belum ada feedback</span>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="{{ $user->role === 'admin' ? '7' : '6' }}" class="px-4 py-6 text-center text-slate-500">Belum ada laporan untuk ditampilkan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <aside class="space-y-6">
                    <div class="rounded-[32px] bg-white border border-blue-200 p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm uppercase tracking-[0.2em] text-blue-500 font-semibold">Info Akun</p>
                                <h3 class="mt-3 text-2xl font-bold text-slate-900">{{ $user->username }}</h3>
                            </div>
                        </div>
                        <div class="mt-6 space-y-3 text-slate-600">
                            <div class="rounded-2xl bg-blue-50 p-4">
                                <p class="text-sm text-slate-500">Nama lengkap</p>
                                <p class="mt-1 font-semibold text-slate-900">{{ $user->nama }}</p>
                            </div>
                            <div class="rounded-2xl bg-blue-50 p-4">
                                <p class="text-sm text-slate-500">Role</p>
                                <p class="mt-1 font-semibold text-slate-900">{{ $user->role }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[32px] bg-gradient-to-br from-blue-100 to-green-50 border border-blue-200 p-6 shadow-sm">
                        <h3 class="text-xl font-semibold text-slate-900">Petunjuk cepat</h3>
                        <ul class="mt-4 space-y-4 text-slate-600">
                            <li class="rounded-2xl bg-white/80 p-4">Siswa hanya dapat melihat laporan yang dia buat sendiri.</li>
                            <li class="rounded-2xl bg-white/80 p-4">Admin melihat aspirasi siswa secara anonim dan dapat mengubah status.</li>
                            <li class="rounded-2xl bg-white/80 p-4">Gunakan tombol tindakan untuk memperbarui status aspirasi.</li>
                        </ul>
                    </div>

                    <div class="rounded-[32px] bg-white border border-blue-200 p-6 shadow-sm">
                        <p class="text-sm text-blue-500 uppercase tracking-[0.2em] font-semibold">Aksi</p>
                        <div class="mt-6">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full rounded-full bg-blue-500 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-600">Logout</button>
                            </form>
                        </div>
                    </div>
                </aside>
            </main>
        </div>
    </div>
</body>
</html>
