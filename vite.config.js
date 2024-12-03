import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/css/style.css'
            ],
            refresh: true,
        }),
        vue(),
    ],
    server: {
        host: true,
        port: 5173,
    },
});
