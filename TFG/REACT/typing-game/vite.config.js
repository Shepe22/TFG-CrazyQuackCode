import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react-swc'

export default defineConfig({
  plugins: [react()],
  server: {
    host: true,     // permite acceder desde fuera del contenedor
    port: 3000      // cambia el puerto por defecto (5173 → 3000)
  }
})
