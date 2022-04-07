const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/dist/default/js/app.js', 'public/assets/default/js')
    .js('resources/dist/custom/js/additional.js', 'public/assets/app/js')
    .js('resources/dist/custom/js/editor.js', 'public/assets/app/js')
    .sass('resources/dist/custom/sass/additional.scss', 'public/assets/app/css')
    .js('resources/dist/front/js/additional.js', 'public/assets/front/js')
    .sass('resources/dist/front/sass/additional.scss', 'public/assets/front/css')
    .postCss('resources/dist/default/css/app.css', 'public/assets/default/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .sourceMaps();
