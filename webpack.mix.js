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
    .sourceMaps(false, 'source-map');

//Admin part
mix.js('resources/js/admin.js', 'public/js/admin/admin.js')
    .sass('resources/sass/admin.scss', 'public/css/admin.css')
    .scripts([
        'node_modules/daterangepicker/daterangepicker.js',
    ], 'public/js/libs.js')
    .copy('node_modules/admin-lte/plugins/jquery/jquery.min.js', 'public/js/admin/jquery.min.js')
    .copy('node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js', 'public/js/admin/bootstrap.bundle.min.js')
    .copy('node_modules/admin-lte/dist/js/adminlte.min.js', 'public/js/admin/adminlte.min.js')
    .sourceMaps(false, 'source-map');
