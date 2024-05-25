import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                './node_modules/flowbite/dist/flowbite.min.js',
            ],
            refresh: true,
        }),
        // require('flowbite/plugin'),
    ],
    // content: [
    //     "./node_modules/flowbite/**/*.js"
    // ]
});
