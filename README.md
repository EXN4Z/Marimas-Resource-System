# marimas-rsc

Monorepo gabungan frontend (React + Vite) dan backend (Laravel) untuk sistem
inventory & operasional Marimas. Sebelumnya dua repo terpisah
(`marimas-one-front`, `marimas-one-back`), digabung jadi satu repo dengan
target akhir: Laravel serve hasil build React, jadi satu app / satu deploy.

## Struktur

```
marimas-rsc/
├── backend/     # Laravel API + (nanti) serve static build React
└── frontend/    # React + Vite SPA (source tidak diubah strukturnya)
```

## Status migrasi

- [x] Phase 1 — Skeleton repo (folder ini)
- [x] Phase 2 — Konfigurasi ulang build frontend (outDir -> backend/public, proxy dev)
- [x] Phase 3 — Catch-all route SPA di Laravel
- [x] Phase 4 — Bersih-bersih scaffold & config CORS
- [ ] Phase 5 — Update pipeline deploy (nixpacks.toml)
- [ ] Phase 6 — Test end-to-end lokal (sebagian udah, lihat commit phase 3)
- [ ] Phase 7 — Cutover deploy & domain (dieksekusi manual di Railway)

## Dev sekarang

Satu command dari `backend/`:

```bash
composer run dev
```

Ini otomatis jalanin `php artisan serve` + `queue:listen` + `pail` (log) +
`npm --prefix ../frontend run dev` (Vite dev server dengan proxy `/api` ke
Laravel) sekaligus.
