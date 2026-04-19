<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PengaduanStoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_pengaduan_success()
    {
        $user = User::factory()->create(['role' => 'siswa']);
        
        $response = $this->actingAs($user)->post(route('pengaduan.store'), [
            'lokasi' => 'Kantin',
            'keterangan' => 'Test complaint',
        ]);

        $this->assertDatabaseHas('pengaduan', [
            'id_user' => $user->id,
            'lokasi' => 'Kantin',
            'keterangan' => 'Test complaint',
            'status' => 'pending',
        ]);

        $response->assertRedirect(route('dashboard'));
        $response->assertSessionHas('success');
    }

    public function test_store_pengaduan_with_lokasi_lainnya()
    {
        $user = User::factory()->create(['role' => 'siswa']);
        
        $response = $this->actingAs($user)->post(route('pengaduan.store'), [
            'lokasi' => 'Lainnya',
            'lokasi_lainnya' => 'Ruang OSIS',
            'keterangan' => 'Test complaint at OSIS room',
        ]);

        $this->assertDatabaseHas('pengaduan', [
            'id_user' => $user->id,
            'lokasi' => 'Ruang OSIS',
            'keterangan' => 'Test complaint at OSIS room',
            'status' => 'pending',
        ]);

        $response->assertRedirect(route('dashboard'));
    }

    public function test_store_pengaduan_prevents_duplicate()
    {
        $user = User::factory()->create(['role' => 'siswa']);
        
        $this->actingAs($user)->post(route('pengaduan.store'), [
            'lokasi' => 'Kantin',
            'keterangan' => 'Test complaint',
        ]);

        // Try to submit the same complaint again
        $response = $this->actingAs($user)->post(route('pengaduan.store'), [
            'lokasi' => 'Kantin',
            'keterangan' => 'Test complaint',
        ]);

        // Should be rejected as duplicate
        $response->assertSessionHas('error', 'Laporan sudah dikirim. Jangan klik dua kali.');
        
        // Only one record should exist
        $this->assertEquals(1, Pengaduan::where('id_user', $user->id)->count());
    }

    public function test_store_pengaduan_admin_cannot_create()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        
        $response = $this->actingAs($admin)->post(route('pengaduan.store'), [
            'lokasi' => 'Kantin',
            'keterangan' => 'Test complaint',
        ]);

        $response->assertSessionHas('error', 'Admin tidak dapat membuat laporan siswa.');
        $this->assertEquals(0, Pengaduan::count());
    }
}
