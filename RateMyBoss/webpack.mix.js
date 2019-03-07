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
   .js('node_modules/admin-lte/dist/js/adminlte.js', 'public/js/AdminLTE.js')
   .js('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.min.js')
   .js('node_modules/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js')
   .js('node_modules/icheck/icheck.min.js', 'public/js/icheck.min.js')
   .js('node_modules/inputmask/dist/min/jquery.inputmask.bundle.min.js', 'public/js/inputmask.bundle.min.js')   
   .styles('node_modules/admin-lte/dist/css/AdminLTE.css', 'public/css/AdminLTE.css')
   .styles('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css')
   .styles('node_modules/bootstrap/dist/css/bootstrap-theme.min.css', 'public/css/bootstrap-theme.min.css')
   .styles('node_modules/admin-lte/dist/css/skins/skin-blue.min.css', 'public/css/skin-blue.min.css')
   .styles('node_modules/admin-lte/dist/css/skins/skin-purple.min.css', 'public/css/skin-purple.min.css')
   .styles('node_modules/admin-lte/dist/css/skins/skin-purple-light.min.css', 'public/css/skin-purple-light.min.css')
   .styles('node_modules/font-awesome/css/font-awesome.css', 'public/css/font-awesome.css')
   .styles('node_modules/ionicons/dist/css/ionicons.css', 'public/css/ionicons.css')
   .sass('resources/sass/app.scss', 'public/css');
