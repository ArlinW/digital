<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
Illuminate\Support\Facades\Facade::setFacadeApplication($app);
$users = \App\Models\User::all(['id','username','nama','role']);
foreach ($users as $user) {
    echo "{$user->id}: {$user->username} ({$user->role})\n";
}
