<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user - update if exists, create if not
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'nama' => 'Administrator',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );

        // Siswa users - only create if doesn't exist
        $siswaData = [
            [
                'username' => 'siswa1',
                'nama' => 'Ahmad Rizki Pratama',
                'password' => bcrypt('password'),
                'role' => 'siswa',
            ],
            [
                'username' => 'siswa2',
                'nama' => 'Siti Nurhaliza',
                'password' => bcrypt('password'),
                'role' => 'siswa',
            ],
            [
                'username' => 'siswa3',
                'nama' => 'Budi Santoso',
                'password' => bcrypt('password'),
                'role' => 'siswa',
            ],
            [
                'username' => 'siswa4',
                'nama' => 'Nur Aini Putri',
                'password' => bcrypt('password'),
                'role' => 'siswa',
            ],
            [
                'username' => 'siswa5',
                'nama' => 'Hendra Wijaya',
                'password' => bcrypt('password'),
                'role' => 'siswa',
            ],
        ];

        foreach ($siswaData as $data) {
            User::firstOrCreate(
                ['username' => $data['username']],
                $data
            );
        }
    }
}