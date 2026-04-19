<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->role === 'admin') {
            $aspirasi = Pengaduan::with('user')->latest()->get();
            $summary = [
                'total' => $aspirasi->count(),
                'pending' => $aspirasi->where('status', 'pending')->count(),
                'diproses' => $aspirasi->where('status', 'diproses')->count(),
                'selesai' => $aspirasi->where('status', 'selesai')->count(),
            ];

            return view('dashboard', compact('user', 'aspirasi', 'summary'));
        }

        $reports = $user->pengaduan()->latest()->get();
        $summary = [
            'total' => $reports->count(),
            'pending' => $reports->where('status', 'pending')->count(),
            'diproses' => $reports->where('status', 'diproses')->count(),
            'selesai' => $reports->where('status', 'selesai')->count(),
        ];

        return view('dashboard', compact('user', 'reports', 'summary'));
    }

    public function storePengaduan(Request $request)
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('dashboard')->with('error', 'Admin tidak dapat membuat laporan siswa.');
        }

        $validated = $request->validate([
            'lokasi' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'foto' => 'nullable|file|mimes:jpeg,png,gif,jpg|max:5120',
        ]);

        $lokasi = $validated['lokasi'];

        $recentDuplicate = Pengaduan::where('id_user', $user->id)
            ->where('lokasi', $lokasi)
            ->where('keterangan', $validated['keterangan'])
            ->where('status', 'pending')
            ->where('created_at', '>=', now()->subSeconds(5))
            ->exists();

        if ($recentDuplicate) {
            return redirect()->back()->with('error', 'Laporan sudah dikirim. Jangan klik dua kali.')->withInput();
        }

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('pengaduan', 'public');
        }

        Pengaduan::create([
            'id_user' => $user->id,
            'lokasi' => $lokasi,
            'keterangan' => $validated['keterangan'],
            'isi_laporan' => '',
            'foto' => $fotoPath,
            'tanggal_lapor' => now(),
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'Laporan berhasil dibuat dan menunggu ditindaklanjuti.');
    }

    public function updateStatus(Request $request, Pengaduan $pengaduan)
    {
        $user = Auth::user();

        if ($user->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'status' => 'required|in:pending,diproses,selesai',
        ]);

        $pengaduan->update(['status' => $validated['status']]);

        return redirect()->route('dashboard')->with('success', 'Status aspirasi berhasil diperbarui.');
    }

    public function updateFeedback(Request $request, Pengaduan $pengaduan)
    {
        $user = Auth::user();

        if ($user->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'feedback' => 'nullable|string|max:1000',
        ]);

        $pengaduan->update(['feedback' => $validated['feedback']]);

        return redirect()->route('dashboard')->with('success', 'Feedback berhasil diperbarui.');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $user = Auth::user();

        if ($user->role !== 'admin') {
            abort(403);
        }

        if ($pengaduan->status !== 'selesai') {
            return redirect()->route('dashboard')->with('error', 'Hanya aspirasi yang sudah selesai yang dapat dihapus.');
        }

        $pengaduan->delete();

        return redirect()->route('dashboard')->with('success', 'Aspirasi berhasil dihapus.');
    }
}
