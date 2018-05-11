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
    mix.sass('app.scss')
});

// elixir(function(mix) {
//     mix.sass('app.scss')
//     .scripts([
//     	'libs/awesomplete.js',
//     	'libs/patternLock.js'
//     	], './public/js/libs.js')
//     .styles([
//     	'libs/awesomplete.css',
//     	'libs/patternLock.css'
//     	],'./public/css/libs.css');
// });
