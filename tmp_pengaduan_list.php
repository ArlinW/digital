<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
Illuminate\Support\Facades\Facade::setFacadeApplication($app);
$items = \App\Models\Pengaduan::all();
foreach ($items as $item) {
    echo "{$item->id} | user {$item->id_user} | lokasi={$item->lokasi} | keterangan={$item->keterangan} | status={$item->status} | tanggal_lapor={$item->tanggal_lapor}\n";
}
