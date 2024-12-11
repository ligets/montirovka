import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/about.css',
                'resources/css/item.css',
                'resources/css/style.css'
            ],
            refresh: true,
        }),
    ],
});
