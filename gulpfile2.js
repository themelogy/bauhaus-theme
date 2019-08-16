var gulp = require('gulp');
var shell = require('gulp-shell');
var elixir = require('laravel-elixir');
var del = require('del');
var themeInfo = require('./theme.json');

process.env.DISABLE_NOTIFIER = true;

elixir.config.publicPath = 'assets';
elixir.config.sourcemaps = true;

var publicPath = '../../public';
var themePath = publicPath + '/Themes/Bauhaus';
var cssPath = themePath + '/css';
var jsPath =  themePath + '/js';

var Task = elixir.Task;

elixir.extend('del', function(path) {
    new Task('del', function() {
        return del(path, {force:true});
    });
});

elixir.extend('stylistPublish', function() {
    new Task('stylistPublish', function() {
        return gulp.src("").pipe(shell("php ../../artisan stylist:publish " + themeInfo.name));
    });
});

elixir(function (mix) {

    // mix.sass(
    //   'style.scss', cssPath + '/style.css'
    // );

    mix.del(['assets/css', 'assets/js']);
    mix.del(themePath+'/**');

    mix.sass('style.scss', 'resources/assets/css/style.css');

    mix.scripts([
    '../plugins/rev-slider/js/jquery.themepunch.tools.min.js',
    '../plugins/rev-slider/js/jquery.themepunch.revolution.min.js',
    '../plugins/rev-slider/js/revolution.extension.actions.min.js',
    '../plugins/rev-slider/js/revolution.extension.carousel.min.js',
    '../plugins/rev-slider/js/revolution.extension.kenburn.min.js',
    '../plugins/rev-slider/js/revolution.extension.layeranimation.min.js',
    '../plugins/rev-slider/js/revolution.extension.migration.min.js',
    '../plugins/rev-slider/js/revolution.extension.navigation.min.js',
    '../plugins/rev-slider/js/revolution.extension.parallax.min.js',
    '../plugins/rev-slider/js/revolution.extension.slideanims.min.js',
    '../plugins/rev-slider/js/revolution.extension.video.min.js'
    ], 'resources/assets/plugins/rev-slider/js/jquery.revolution.min.js');

    mix.styles([
        'style.css'
    ], 'resources/assets/css/style.min.css');

    mix.copy('resources/assets', 'assets');

    mix.version([
        'css/style.min.css'
    ], 'assets');

    mix.stylistPublish();

});
