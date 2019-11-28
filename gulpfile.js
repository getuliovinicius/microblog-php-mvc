// gulpfile.js

'use strict';
 
var gulp = require('gulp');
const notify = require("gulp-notify");
var compileCSS = require('gulp-sass');
var minifyCSS = require('gulp-clean-css') 
var concat = require('gulp-concat');
var del = require('del');

gulp.task('css', function() {
	return gulp.src('./public/assets/css_dev/**/*.scss')
		.pipe(compileCSS())
		.on('error', notify.onError({title:'erro ao compilar', message:'<%= error.message %>'}))
		.pipe(minifyCSS())
		.pipe(concat('main.css'))
		.pipe(gulp.dest('./public/assets/css'));
});

gulp.task('background', function () {
	gulp.watch('./public/assets/css_dev/**/*.scss', ['css']);
});

gulp.task('default', ['css', 'background']);