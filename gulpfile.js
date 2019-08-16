'use strict';

const gulp      = require('gulp'),
    shell       = require('gulp-shell'),
    sass        = require('gulp-sass'),
    clean       = require('gulp-clean'),
    del         = require('del'),
    concat      = require('gulp-concat'),
    browserSync = require('browser-sync').create(),
    runSequence = require('run-sequence'),
    sourcemaps  = require('gulp-sourcemaps'),
    minify      = require('gulp-minify'),
    less        = require('gulp-less'),
    minifyCss   = require('gulp-minify-css'),
    merge       = require('merge-stream'),
    uglify      = require('gulp-uglify'),
    themeInfo   = require('./theme.json');

let path, theme, assets, resource = {};

path = {
    "public"      : "../../public",
    "theme"       : "../../public/themes/" + themeInfo.name.toLowerCase(),
    "assets"      : "assets",
    "resource"    : "resources",
    "css"         : "/css",
    "js"          : "/js",
    "sass"        : "/sass",
    "video"       : "/videos",
    "image"       : "/images",
    "fonts"       : "/fonts",
    "vendor"      : "/vendor",
    "maps"        : "../maps",
    "plugins"     : "/plugins"
};

theme = {
    "name"      : themeInfo.name,
    "path"      : path.theme,
    "js"        : path.theme + path.js,
    "css"       : path.theme + path.css,
    "maps"      : path.maps
};

assets = {
    "path"      : path.assets,
    "css"       : path.assets + path.css,
    "js"        : path.assets + path.js,
    "image"     : path.assets + path.image,
    "video"     : path.assets + path.video,
    "vendor"    : path.assets + path.vendor,
    "maps"      : path.maps
};

resource = {
    "path"      : path.resource,
    "vendor"    : path.resource + path.vendor,
    "extVendor" : path.resource + '/ext-vendor',
    "assets"    : path.resource + '/' + path.assets
};

resource.asset = {
    "css"       : resource.assets + path.css,
    "js"        : resource.assets + path.js,
    "image"     : resource.assets + path.image,
    "video"     : resource.assets + path.video,
    "vendor"    : resource.assets + path.vendor,
    "sass"      : resource.assets + path.sass,
    "fonts"     : resource.assets + path.fonts,
    "maps"      : path.maps,
    "plugins"   : resource.assets + path.plugins
};

let vendorCopy = {
    src: [
        // resource.vendor+'/owl.carousel/dist/**',
    ],
    dest: [
        // resource.asset.vendor+'/owl.carousel'
    ]
};

gulp.task('sass', function () {
    return gulp.src([
        resource.asset.sass + '/**/*.scss'
    ])
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write(resource.asset.maps))
        .pipe(gulp.dest(resource.asset.css))
        .pipe(browserSync.reload({
            stream: true
        }));
});

gulp.task('sass-public', function () {
    return gulp.src([
        resource.asset.sass + '/**/*.scss'
    ])
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write(theme.maps))
        .pipe(gulp.dest(theme.css))
        .pipe(browserSync.reload({
            stream: true
        }));
});

gulp.task('revolution.combine', function() {
    return gulp.src([
        resource.asset.plugins + '/rev-slider/js/jquery.themepunch.tools.min.js',
        resource.asset.plugins + '/rev-slider/js/jquery.themepunch.revolution.min.js',
        resource.asset.plugins + '/rev-slider/js/revolution.extension.actions.min.js',
        resource.asset.plugins + '/rev-slider/js/revolution.extension.carousel.min.js',
        resource.asset.plugins + '/rev-slider/js/revolution.extension.kenburn.min.js',
        resource.asset.plugins + '/rev-slider/js/revolution.extension.layeranimation.min.js',
        resource.asset.plugins + '/rev-slider/js/revolution.extension.migration.min.js',
        resource.asset.plugins + '/rev-slider/js/revolution.extension.navigation.min.js',
        resource.asset.plugins + '/rev-slider/js/revolution.extension.parallax.min.js',
        resource.asset.plugins + '/rev-slider/js/revolution.extension.slideanims.min.js',
        resource.asset.plugins + '/rev-slider/js/revolution.extension.video.min.js',
    ])
        .pipe(minify())
        .pipe(concat('jquery.revolution.min.js'))
        .pipe(gulp.dest(resource.asset.plugins + '/rev-slider/js'));
});

gulp.task('vendors.combine', function() {
    return gulp.src([
        resource.asset.js + '/jquery.min.js',
        resource.asset.js + '/animsition.min.js',
        resource.asset.js + '/bootstrap.min.js',
        resource.asset.js + '/smoothscroll.js',
        resource.asset.js + '/wow.min.js',
        resource.asset.js + '/jquery.stellar.min.js',
        resource.asset.js + '/owl.carousel.min.js',
        resource.asset.js + '/jquery.pagepiling.js',
    ])
        .pipe(concat('vendors.js'))
        .pipe(gulp.dest(resource.asset.js));
});

gulp.task('vendors.minify', ['vendors.combine'],function() {
    return gulp.src([
        resource.asset.js + '/vendors.js',
    ])
        .pipe(uglify())
        .pipe(gulp.dest(resource.asset.js));
});

gulp.task('clear-vendor', function(){
    return del(resource.asset.vendor+"/**/*", {force: true});
});

gulp.task('vendor-copy', function () {
   for (let i = 0; i < vendorCopy.src.length; i++) {
       gulp.src(vendorCopy.src[i])
           .pipe(gulp.dest(vendorCopy.dest[i]));
   }
   return;
});

gulp.task('scripts', function(){
    del(resource.asset.js+'/scripts.min.js',{force:true});
    return gulp.src(resource.asset.js+'/scripts.js')
        .pipe(minify({
            ext: {
                min: '.min.js'
            }
        }))
        .pipe(gulp.dest(resource.asset.js));
});


gulp.task('scripts-copy', ['scripts'], function(){
    return gulp.src(resource.asset.js+'/**/*')
        .pipe(gulp.dest(theme.js))
        .pipe(browserSync.reload({
            stream: true
        }));
});

gulp.task('clear-assets', function(){
    return del(assets.path+"/**/*", {force: true});
});

gulp.task('copy', ['clear-assets'], function () {
    return gulp.src(resource.assets+'/**/*')
        .pipe(gulp.dest(assets.path));
});

gulp.task('stylistPublish', function(){
    return gulp.src("").pipe(shell("php ../../artisan stylist:publish " + theme.name));
});

gulp.task('clear-public', function(){
    return del(theme.path+"/**/*", {force: true});
});

gulp.task('production', ['clear-public'], function(){
    runSequence('sass', 'scripts', 'vendor-copy', 'copy', 'stylistPublish');
});

// Configure the proxy server for livereload
var proxyServer = "http://dev.akdag.com";

var arrAddFiles = [
    'views/**/*.php'
];

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: proxyServer,
        files: arrAddFiles,
        ghostMode: {
            clicks: true,
            location: true,
            forms: true,
            scroll: true
        },
        notify: true,
        open: false
    });
});

gulp.task('watch', ['browser-sync'], function () {
    gulp.watch([resource.asset.sass + '/**/*.scss'], ['sass-public']);
    gulp.watch([resource.asset.js + '/**/*.js'], ['scripts-copy']);
    gulp.watch('views/**/*.php', browserSync.reload);
});
