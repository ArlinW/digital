<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
Illuminate\Support\Facades\Facade::setFacadeApplication($app);
Illuminate\Support\Facades\DB::beginTransaction();
try {
    $user = \App\Models\User::find(1);
    \Illuminate\Support\Facades\Auth::login($user);
    $request = Illuminate\Http\Request::create('/pengaduan', 'POST', [
        'lokasi' => 'Kantin',
        'keterangan' => 'Test complaint from script',
    ]);
    $controller = new \App\Http\Controllers\DashboardController();
    $response = $controller->storePengaduan($request);
    if (method_exists($response, 'getTargetUrl')) {
        echo 'Redirected to: ' . $response->getTargetUrl() . PHP_EOL;
    } else {
        print_r($response);
    }
    Illuminate\Support\Facades\DB::rollBack();
} catch (Throwable $e) {
    echo get_class($e) . ': ' . $e->getMessage() . PHP_EOL;
    echo $e->getTraceAsString() . PHP_EOL;
    Illuminate\Support\Facades\DB::rollBack();
}
