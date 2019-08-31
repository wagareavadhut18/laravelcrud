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

mix.scripts([
    'resources/assets/lib/jquery/jquery.min.js',
    'resources/assets/lib/bootstrap/bootstrap.min.js',
    'resources/assets/lib/bootstrap/popper.min.js',
    'resources/assets/lib/jquery/validate.min.js',
    'resources/assets/lib/datatable/dataTables.min.js',
    'resources/assets/lib/datatable/dataTables.bootstrap4.min.js',
    'resources/assets/lib/datatable/dataTables.rowReorder.min.js',
    'resources/assets/js/datatables.js',
    'resources/assets/js/usersDatatable.js',
	'resources/assets/js/custom.js'
], 'public/js/app.js');

mix.styles([
    'resources/assets/lib/bootstrap/bootstrap.min.css',
    'resources/assets/lib/datatable/dataTables.bootstrap4.min.css',
    'resources/assets/lib/datatable/bootstrap.css',
    'resources/assets/lib/datatable/rowReorder.bootstrap4.min.css',

], 'public/css/app.css');
