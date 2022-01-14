let mix = require('laravel-mix');

mix.js('assets/src/app.js', 'assets/dist').autoload({
    jquery: ['$', 'window.jQuery']
});

mix.sass('assets/src/app.scss', 'assets/dist');
