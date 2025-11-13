import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { fileURLToPath, URL } from 'node:url';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/admin/admin.scss',
                'resources/js/admin/admin.js',

                'resources/css/public/public.scss',
                'resources/js/public/public.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@public': fileURLToPath(new URL('./public', import.meta.url)),
        },
    },
    //publicDir: 'public',
    css: {
        devSourcemap: true,
    },
    build: {
        //assetsInlineLimit: 0,
        rollupOptions: {
            output: {
                assetFileNames: assetInfo => {
                    let extType = assetInfo.name.split('.').pop();
                    if (/css|scss/.test(extType)) {
                        return 'assets/css/[name]-[hash][extname]';
                    } else if (/woff|woff2/.test(extType)) {
                        return 'assets/fonts/[name][extname]';
                    } else if (/png|jpe?g|svg|gif|webp/.test(extType)) {
                        return 'assets/img/[name][extname]';
                    }
                    return 'assets/[name]-[hash][extname]';
                },
                chunkFileNames: 'assets/js/[name]-[hash].js',
                entryFileNames: 'assets/js/[name]-[hash].js',
            },
        },
    },
});
