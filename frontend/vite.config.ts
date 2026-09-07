import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
  plugins: [react(), tailwindcss()],

  build: {
    // Hasil build numpang di public Laravel, biar Laravel yang serve
    // sebagai app tunggal (1 server, 1 port) pas production.
    outDir: '../backend/public',
    // JANGAN true — public Laravel punya index.php, .htaccess, storage
    // symlink, dll yang gak boleh kehapus tiap kali build.
    emptyOutDir: false,
  },

  server: {
    // Dev tetap 2 proses (vite dev + php artisan serve), tapi browser
    // cuma ngomong ke 1 origin (port vite). Request /api diteruskan ke
    // Laravel di belakang layar -> gak perlu CORS pas dev juga.
    proxy: {
      '/api': {
        target: 'http://localhost:8000',
        changeOrigin: true,
      },
    },
  },
})