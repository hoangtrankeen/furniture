let mix = require('laravel-mix');

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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

mix.sass('resources/assets/sass/main.scss', 'public/css')
    .styles([
    'public/assets/libs/bootstrap/css/bootstrap.min.css',
    'public/assets/libs/font-awesome/css/font-awesome.min.css',
    'public/assets/libs/animate/animated.css',
    'public/assets/libs/owl.carousel.min/owl.carousel.min.css',
    'public/assets/libs/jquery.mmenu.all/jquery.mmenu.all.css',
    'public/assets/libs/pe-icon-7-stroke/css/pe-icon-7-stroke.css',
    'public/assets/libs/direction/css/noJS.css',
    'public/assets/libs/slick-sider/slick.min.css',
    'public/assets/css/main.css',
    'public/assets/css/home.css'
        ], 'public/css/main.css')
    .sourceMaps()
    .options({
        processCssUrls: false
    });