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
mix.sass('resources/scss/app.scss', 'public/css').options({
    processCssUrls: false
}).sourceMaps(true, 'source-map');

mix.styles([
    'resources/assets/admin/css/adminlte.css'
], 'public/assets/admin/css/adminlte.css');

mix.scripts([
    'resources/assets/admin/js/adminlte.js'
], 'public/assets/admin/js/adminlte.js')

mix.copyDirectory('resources/assets/admin/img', 'public/assets/admin/img');

mix.copyDirectory('resources/js/library/jquery-3.6.0.min.js', 'public/library/jquery-3.6.0.min.js');

mix.js('resources/js/app.js', 'public/js');
