const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();


    //agrege
mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');

mix.js(['resources/assets/js/app.js',
        'resources/assets/vendor/bootstrap/bootstrap.min.js',
        'resources/assets/vendor/bootstrap/bootstrap.bundle.min.js',
    ], 'public/js/app.js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false
    });