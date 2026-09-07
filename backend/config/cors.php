<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    /*
    | Sekarang frontend & backend satu origin (Laravel yang serve React
    | build), jadi CORS gak lagi krusial buat app utama jalan. Yang
    | disisain di sini cuma buat: (1) dev lokal kalau ada yang jalanin
    | frontend dev server TANPA lewat proxy vite, dan (2) masa transisi
    | selama deploy lama (Vercel/2 service Railway) masih hidup
    | berdampingan. Setelah cutover ke 1 deploy kelar & deploy lama
    | dimatikan, FRONTEND_URL & origin lama ini boleh dibuang.
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => array_filter([
        'http://localhost:5173',
        'http://localhost:5174',
        env('FRONTEND_URL'), // isi ini kalau masih ada deploy lama yang perlu akses API selama masa transisi
    ]),

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
