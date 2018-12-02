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
   .sass('resources/sass/app.scss', 'public/css');
mix.browserSync({
    proxy: 'www.api.com',   // apache或iis等代理地址
    port: 3000,
    notify: false,        // 刷新是否提示
    watchTask: true,
    open: 'external',
    host: '192.168.0.103',  // 本机ip, 这样其他设备才可实时看到更新
});
