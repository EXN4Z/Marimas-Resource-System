<?php

use Illuminate\Support\Facades\Route;

// SPA (React) — Laravel yang serve buat semua path, KECUALI api/*,
// sanctum/*, storage/*, up (health check). Asset statis (JS/CSS/img)
// gak akan pernah nyampe ke sini karena file-nya beneran ada di
// public/, jadi diserve langsung sama web server sebelum kena router.
Route::get('/{any?}', function () {
    $indexPath = public_path('index.html');

    abort_unless(
        file_exists($indexPath),
        500,
        'Frontend belum di-build. Jalankan `npm run build` di folder frontend/.'
    );

    return response(file_get_contents($indexPath), 200)
        ->header('Content-Type', 'text/html');
})->where('any', '^(?!api|sanctum|storage|up).*$');
