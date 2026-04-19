<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    Illuminate\Support\Facades\Facade::setFacadeApplication($app);
    \Illuminate\Support\Facades\DB::beginTransaction();
    $p = \App\Models\Pengaduan::create([
        'id_user' => 1,
        'lokasi' => 'Kantin',
        'keterangan' => 'Test',
        'isi_laporan' => '',
        'foto' => null,
        'tanggal_lapor' => now(),
        'status' => 'pending',
    ]);
    print_r($p->toArray());
    \Illuminate\Support\Facades\DB::rollBack();
} catch (Exception $e) {
    echo get_class($e) . ': ' . $e->getMessage() . PHP_EOL;
    \Illuminate\Support\Facades\DB::rollBack();
}
