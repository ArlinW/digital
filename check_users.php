<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Http\Kernel')->handle($request = Illuminate\Http\Request::capture());

$users = \Illuminate\Support\Facades\DB::table('users')->get();
echo "=== Users in Database ===\n";
foreach($users as $user) {
    echo "ID: {$user->id}, Name: {$user->nama}, Role: {$user->role}, Username: {$user->username}\n";
}
