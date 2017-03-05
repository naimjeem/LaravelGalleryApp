var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    //mix.sass('app.scss');

    mix.styles([
    	'bootstrap.min.css',
    	'custom-bootstrap.min.css',
        'style.css'    	
    ]);

    mix.scripts([
    	'bootstrap.min.js',
        'jquery.min.js',
        'custom.js'    	
    ]);

    mix.version([
    	'css/all.css',
    	'js/all.js'
    ]);
});
