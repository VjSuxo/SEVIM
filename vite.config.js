import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/style.css',
                'resources/css/style_Edicion.css',
                'resources/css/style_adminInex.css',
                'resources/css/style_tabla.css',
                'resources/css/style_index.css',
                'resources/css/style_form.css',
                'resources/css/style_about.css',
                'resources/css/style_detalles.css',
                'resources/css/style_flipCard.css',
                'resources/css/style_login.css',
                'resources/css/style_registro.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
