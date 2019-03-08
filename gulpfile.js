var elixir = require('laravel-elixir');



elixir(function(mix) {
    mix.sass('app.scss')
        .styles([
            'libs/blog-post.css',
            'libs/bootstrap.min.css',
            'libs/font-awesome.css',
            'libs/metisMenu.css',
            'libs/sb-admin-2.css'
        ], './public/css/libs.css')
        .scripts([
            'libs/jquery.js',
            'libs/bootstrap.min.js',
            'libs/metisMenu.js',
            'libs/sb-admin-2.js',
            'libs/scripts.js'
        ], './public/js/libs.js');

});
