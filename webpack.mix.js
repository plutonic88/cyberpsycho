const { mix } = require('laravel-mix');

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

mix.js(['resources/assets/js/app-fullinfov2.js'], 'public/js')
	.js(['resources/assets/js/app-noinfo.js'], 'public/js')
	.js(['resources/assets/js/prac.js'], 'public/js')
	.js(['resources/assets/js/graph.js'], 'public/js')
	.js(['resources/assets/js/mouse.js'], 'public/js')
	.js(['resources/assets/js/mouseonnode.js'], 'public/js')
	.js(['resources/assets/js/qa.js'], 'public/js')
	.js(['resources/assets/js/end.js'], 'public/js')
	.js(['resources/assets/js/prac-fullinfo.js'], 'public/js')
	.js(['resources/assets/js/prac-noinfo.js'], 'public/js')
	.js(['resources/assets/js/instruction.js'], 'public/js')
	.sass('resources/assets/sass/app.scss', 'public/css');