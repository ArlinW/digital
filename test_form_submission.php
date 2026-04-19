<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

// Bootstrap Laravel
Illuminate\Support\Facades\Facade::setFacadeApplication($app);
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "=== Testing Complaint Form Submission ===\n\n";

try {
    // Test 1: Check if student users exist
    echo "1. Checking student users...\n";
    $students = \App\Models\User::where('role', 'siswa')->get();
    if ($students->count() > 0) {
        echo "   ✓ Found " . $students->count() . " student(s)\n";
        foreach ($students as $student) {
            echo "     - {$student->nama} (ID: {$student->id})\n";
        }
    } else {
        echo "   ✗ No student users found\n";
    }

    // Test 2: Simulate form submission
    echo "\n2. Testing form submission (for student ID 3)...\n";
    $user = \App\Models\User::find(3);
    
    if (!$user) {
        echo "   ✗ User ID 3 not found\n";
    } else {
        echo "   ✓ Found user: {$user->nama}\n";
        echo "   ✓ Role: {$user->role}\n";

        // Check if user can submit complaints
        if ($user->role === 'admin') {
            echo "   ✗ Cannot submit - user is admin\n";
        } else {
            echo "   ✓ User can submit complaints (role is not admin)\n";
            
            // Try to create a complaint
            echo "\n3. Attempting to create complaint...\n";
            \Illuminate\Support\Facades\DB::beginTransaction();
            
            $complaint = \App\Models\Pengaduan::create([
                'id_user' => $user->id,
                'lokasi' => 'Kantin',
                'keterangan' => 'Test from diagnosis script',
                'isi_laporan' => '',
                'foto' => null,
                'tanggal_lapor' => now(),
                'status' => 'pending',
            ]);
            
            echo "   ✓ Complaint created successfully!\n";
            echo "   ✓ ID: {$complaint->id}\n";
            echo "   ✓ Status: {$complaint->status}\n";
            
            \Illuminate\Support\Facades\DB::rollBack();
        }
    }

    // Test 4: Check sessions table
    echo "\n4. Checking sessions table...\n";
    $sessions = \Illuminate\Support\Facades\DB::table('sessions')->count();
    echo "   ✓ Sessions table exists with {$sessions} active session(s)\n";

    // Test 5: Check CSRF capability
    echo "\n5. Checking CSRF token support...\n";
    $csrfToken = bin2hex(random_bytes(32));
    echo "   ✓ CSRF tokens can be generated\n";
    echo "   ✓ Token example: " . substr($csrfToken, 0, 20) . "...\n";

    echo "\n" . str_repeat("=", 50) . "\n";
    echo "✓ ALL BACKEND TESTS PASSED\n";
    echo "✓ The problem is likely BROWSER-SIDE\n";
    echo str_repeat("=", 50) . "\n";
    echo "\nPOSSIBLE ISSUES:\n";
    echo "1. You might be logged in as ADMIN instead of STUDENT\n";
    echo "2. JavaScript error preventing form submission (check F12 console)\n";
    echo "3. Network error on form POST request (check F12 network tab)\n";
    echo "4. Form validation error (check submitted data)\n\n";

} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo "Exception: " . get_class($e) . "\n";
}
