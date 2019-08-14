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

 mix.styles([
        'public/app/assets/css/loading.css',
        'public/app/assets/css/style.css'
    ], 'public/app/assets/app.css')
    .babel([
        'public/app/assets/js/loading.js',
        'public/app/assets/js/app.js'
    ], 'public/app/assets/app.js')
    // .babel('public/app/assets/app.js')
    // .minify('public/app/assets/app.js')
    // .minify('public/app/assets/app.css')
    .sourceMaps()
    .version();
