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

mix.js('resources/js/app.js', 'public/assets/backend/js')
    .sass('resources/sass/app.scss', 'public/assets/backend/css')
    .combine([
        'resources/css/backend/admin.css',
    ], 'public/assets/backend/css/admin.css', __dirname)
    
    mix.copy('resources/js/summernote-bs4.min.js', 'public/assets/backend/js');    
    mix.copy('resources/css/summernote-bs4.css', 'public/assets/backend/css');
    mix.copy('resources/css/font/summernote.eot', 'public/assets/backend/css/font');
    mix.copy('resources/css/font/summernote.ttf', 'public/assets/backend/css/font');
    mix.copy('resources/css/font/summernote.woff', 'public/assets/backend/css/font');