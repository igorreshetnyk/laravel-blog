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
mix.copy('resources/images', 'public/images')
    // .js('node_modules/bootstrap/dist/js/bootstrap.js','public/js')
    // .js('node_modules/popper.js/dist/popper.js', 'public/js')
    // .js('node_modules/jquery/dist/jquery.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles('resources/css/main.css', 'public/css/main.css')
    .sourceMaps();
