import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import {copy} from 'vite-plugin-copy';



export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        copy({
            targets: [
              { src: 'node_modules/tinymce/**/*', dest: 'public/js/tinymce' },
            ],
            verbose: true,
        }),
    ],
});

