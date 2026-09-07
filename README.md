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
- [ ] Phase 2 — Konfigurasi ulang build frontend (outDir -> backend/public, proxy dev)
- [ ] Phase 3 — Catch-all route SPA di Laravel
- [ ] Phase 4 — Bersih-bersih scaffold & config CORS
- [ ] Phase 5 — Update pipeline deploy (nixpacks.toml)
- [ ] Phase 6 — Test end-to-end lokal
- [ ] Phase 7 — Cutover deploy & domain

## Dev (sementara, sebelum Phase 2)

Masih jalan sebagai 2 proses terpisah:

```bash
# terminal 1
cd backend && composer install && php artisan serve

# terminal 2
cd frontend && npm install && npm run dev
```
