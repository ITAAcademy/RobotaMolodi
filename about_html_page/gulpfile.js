var gulp = require('gulp');
const imagemin = require('gulp-imagemin');
var prettify = require('gulp-jsbeautifier');
var uncss = require('gulp-uncss');
var autoprefixer = require('gulp-autoprefixer');
var cssmin = require('gulp-cssmin');
var cleanCSS = require('gulp-clean-css');
var minifyjs = require('gulp-js-minify');
var imageResize = require('gulp-image-resize');
var rename = require("gulp-rename");

gulp.task('autoprefixer', function () {
    return gulp.src('./dev/css/style.css')
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('./dev/css/'));
});

gulp.task('uncss', function () {
    return gulp.src('style.css')
        .pipe(uncss({
            html: ['./dev/index.html']
        }))
        .pipe(gulp.dest('./dev/css/'));
});


gulp.task('minifyImg', function() {
    gulp.src('dev/images/*')
        .pipe(imagemin())
        .pipe(gulp.dest('images'));
    gulp.src('dev/images/gallery/*')
        .pipe(imagemin())
        .pipe(gulp.dest('images/gallery/'));
    gulp.src('dev/images/gallery/resize/*')
        .pipe(imagemin())
        .pipe(gulp.dest('images/gallery/resize/'));
});

/*
gulp.task('minifyImgGallery', function() {

    gulp.src("dev/images/*")
        .pipe(imageResize({ width : 150 }))
        .pipe(rename(function (path) { path.basename += "-thumbnail"; }))
        .pipe(gulp.dest('images/gallery/resize'));
    gulp.src('dev/images/gallery/*')
        .pipe(imagemin())
        .pipe(gulp.dest('images/gallery/'));
});
*/

gulp.task('prettifyHtml', function() {
    gulp.src(['./dev/*.html'])
        .pipe(prettify())
        .pipe(gulp.dest('./'));
});

gulp.task('prettifyCss', function() {
    gulp.src(['./dev/css/*.css'])
        .pipe(prettify())
        .pipe(gulp.dest('./css/'));
});

gulp.task('prettifyJs', function() {
    gulp.src(['./dev/js/*.js'])
        .pipe(prettify())
        .pipe(gulp.dest('./js/'));
});



gulp.task('default', [
    'autoprefixer',
    'minifyImg',
    'prettifyHtml',
    'prettifyCss',
    'prettifyJs',
    'uncss'
]);


gulp.task('styles', function(){
    return gulp.src('./dev/**/style.css')
        .pipe(cleanCSS())
        .pipe(cssmin())
        .pipe(gulp.dest('./'));
});
gulp.task('compressjs', function() {
    gulp.src('./dev/js/script.js')
        .pipe(minifyjs())
        .pipe(gulp.dest('./js/'));
});


gulp.task('production', [
    'styles',
    'compressjs'
]);