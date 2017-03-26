var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var imagemin = require('gulp-imagemin');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var livereload = require('gulp-livereload');
var minify = require('gulp-minify');
var cleanCSS = require('gulp-clean-css');

var html = './../**/*.html';
var master = './../scss/master.scss';
var scss = './../scss/**/*.scss';
var js_vendor = './../js-dev/vendor/**/*.js';
var js_main = './../js-dev/main/*.js';
var js = './../js-dev/partial/*.js';

gulp.task('sass', function () {
 
    gulp.src(master)

    	.pipe(plumber(plumberErrorHandler))
 
        .pipe(sass())

        .pipe(cleanCSS({compatibility: 'ie8'}))
 
        .pipe(gulp.dest('./../css'))

        .pipe(livereload());
 
});

gulp.task('js_vendor', function () {
 
    gulp.src(js_vendor)

        .pipe(plumber(plumberErrorHandler))
         
        .pipe(concat('vendor.js'))

        .pipe(minify({
        ext:{
            min:'-min.js'
        },
        exclude: ['tasks'],
        ignoreFiles: ['.combo.js', '-min.js']
    }))
         
        .pipe(gulp.dest('./../js'))

        .pipe(livereload());
 
});

gulp.task('js_main', function () {
 
    gulp.src(js_main)

        .pipe(plumber(plumberErrorHandler))
         
        .pipe(concat('main.js'))

        .pipe(minify({
        ext:{
            min:'-min.js'
        },
        exclude: ['tasks'],
        ignoreFiles: ['.combo.js', '-min.js']
    }))
         
        .pipe(gulp.dest('./../js'))

        .pipe(livereload());
 
});

gulp.task('js', function () {
 
    gulp.src(js)

        .pipe(plumber(plumberErrorHandler))
         
        .pipe(concat('theme.js'))

        .pipe(minify({
        ext:{
            min:'-min.js'
        },
        exclude: ['tasks'],
        ignoreFiles: ['.combo.js', '-min.js']
    }))
         
        .pipe(gulp.dest('./../js'))

        .pipe(livereload());
 
});

gulp.task('watch', function() {

    livereload.listen();

    gulp.watch(html);
 
  gulp.watch(scss, ['sass']);
 
  gulp.watch(js, ['js']);

  gulp.watch(js_main, ['js_main']);

  gulp.watch(js_vendor, ['js_vendor']);
 
});

var plumberErrorHandler = { errorHandler: notify.onError({
 
    title: 'Gulp',
 
    message: 'Error: <%= error.message %>'
 
  })
 
};
 
gulp.task('default', ['sass','js_main','js','watch', 'js_vendor']);