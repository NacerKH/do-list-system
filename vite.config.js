import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

import path, { resolve, dirname } from 'node:path'
import { fileURLToPath } from 'url'
import { splitVendorChunkPlugin } from 'vite'
export default defineConfig({
    server: {

        host: '0.0.0.0',

    },
    plugins: [
        splitVendorChunkPlugin(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
 
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',

            '@': path.resolve(__dirname, './resources/js'),
        },
    },
});
