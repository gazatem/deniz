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

mix.js('js/app.js', 'assets/js')
    .sass('sass/app.scss', 'assets/css')

    .combine([
        'css/theme.css',
        'css/animate.css',
        'css/responsive.css',
    ], 'assets/css/theme.css', __dirname);
    mix.copy('js/theme.js', 'assets/js'); 
    mix.copy('assets', '../../../public/themes/starter');
