var gulp = require('gulp');
var sass = require('gulp-sass');
var cssnano = require('gulp-cssnano');
var rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var uglify = require('gulp-uglify');
var wpPot = require('gulp-wp-pot');
var sort = require('gulp-sort');
var plumber = require('gulp-plumber');
var eyeglass = require("eyeglass");
var browserSync = require('browser-sync').create();
var babel = require('gulp-babel');
var print = require('gulp-print');
var browserify = require("browserify");
var babelify = require("babelify");
var source = require('vinyl-source-stream');
var gutil = require('gulp-util');
var fs = require('fs');




/*---------------------------------------------------------------------------
 * Sass compilation
 * - compile Scss file to CSS
 * - Auto prefix CSS
 * - Reload browser
 ---------------------------------------------------------------------------*/
gulp.task('sass', function() {
    gulp.src('assets/scss/main.scss')
        .pipe(plumber())
        .pipe(sass(eyeglass()))
        .pipe(autoprefixer())
        .pipe(gulp.dest('./dist/styles'))
        .pipe(browserSync.stream());
});




/*---------------------------------------------------------------------------
 * Minify CSS
 * - Launch the task before production
 ---------------------------------------------------------------------------*/
gulp.task('minify-css', function () {
    gulp.src('dist/styles/main.css')
        .pipe(cssnano())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./dist/styles'));
});




/*---------------------------------------------------------------------------
 * Image optimisation
 * - Launch the task before production
 ---------------------------------------------------------------------------*/
gulp.task('images', function() {
    gulp.src('assets/images/*')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(print())
        .pipe(gulp.dest('./dist/images'));
});




/*---------------------------------------------------------------------------
 * Fonts
 ---------------------------------------------------------------------------*/
gulp.task('fonts', function() {
    return gulp.src(['assets/fonts/*'])
        .pipe(print())
        .pipe(gulp.dest('./dist/fonts/'));
});



/*---------------------------------------------------------------------------
 * es6
 * - Babel - converts ES6 code to ES5 - however it doesn't handle imports.
 * - Browserify - crawls your code for dependencies and packages them up.
 * - Babelify - a babel plugin for browserify, to make browserify.
 ---------------------------------------------------------------------------*/
gulp.task('es6', function() {
    browserify({ debug: true })
        .transform(babelify, { presets: ['es2015'] })
        .require("./assets/js/main.js", { entry: true })
        .bundle()
        .on('error',gutil.log)
        .pipe(source('main.js'))
    .pipe(gulp.dest('./dist/scripts'));
});

gulp.task('js-watch', ['es6'], function (done) {
    browserSync.reload();
    done();
});




/*---------------------------------------------------------------------------
 * Minify Javascript
 * - Launch the task before production
 ---------------------------------------------------------------------------*/
gulp.task('minify-js', function() {
    gulp.src('dist/scripts/main.js')
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./dist/scripts'));
});




/*---------------------------------------------------------------------------
 * Make pot file
 * - Prepare the theme for i18n
 ---------------------------------------------------------------------------*/
// gulp.task('pot', function () {
//     return gulp.src('./**/*.php')
//         .pipe(sort())
//         .pipe(wpPot( {
//             domain: 'monsieurpress',
//             destFile:'monsieurpress.pot',
//             package: 'monsieurpress',
//             lastTranslator: 'John Doe <mail@example.com>',
//             team: 'Team Team <mail@example.com>'
//         } ))
//         .pipe(gulp.dest('languages'));
// });




/*---------------------------------------------------------------------------
 * Browser Sync
 * - Static Server + watching scss/js/php files
 ---------------------------------------------------------------------------*/
gulp.task('serve', ['sass', 'es6'], function() {
    browserSync.init({ proxy: "192.168.10.11" });
    gulp.watch("assets/scss/**/*.scss", ['sass']);
    gulp.watch("assets/js/**/*.js", ['js-watch']);
    gulp.watch("templates/*.php").on('change', browserSync.reload);
});




/*---------------------------------------------------------------------------
 * Default Watcher
 * - Launch the task before developing
 ---------------------------------------------------------------------------*/
gulp.task('default',['sass', 'es6', 'serve']);
gulp.task('watch',['serve']);
gulp.task('production',['fonts', 'sass', 'minify-css', 'es6', 'minify-js', 'images']);
