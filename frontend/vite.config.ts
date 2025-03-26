import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vite.dev/config/
export default defineConfig({
  plugins: [vue()],
  server: {
    host: '0.0.0.0',  // Cho phép truy cập từ máy khác trong mạng LAN
    port: 5173,       // Đảm bảo port đang đúng
    strictPort: true, // Báo lỗi nếu port bị chiếm dụng
  },
  build: {
    outDir: 'dist', // Thư mục output khi build
    sourcemap: false, // Tắt sourcemap để bảo vệ mã nguồn
  }
})
