var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();
const gcmq = require('gulp-group-css-media-queries');
const cleanCSS = require('gulp-clean-css');
const { gulpSassError } = require('gulp-sass-error');
const throwError = true;

var config = {
    path: {
        scss: './dev/**/*.scss',
        html: './public/**/*.php'
    },
    output: {
        cssName: 'style.css',
        path: './'
    }
};

gulp.task('scss', function() {
    return gulp.src(/*config.path.scss*/'./dev/2-extend.scss')
        .pipe(sourcemaps.init())
        .pipe(
            sass()          
            .on('error', gulpSassError(throwError))
        )
        .pipe(gcmq())
        .pipe(concat(config.output.cssName))
        .pipe(autoprefixer({
            browsers:['> 0.1%']
        }))
        .pipe(cleanCSS({
            level: 0,
            format: 'keep-breaks'
        }))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(config.output.path))
        //.pipe(browserSync.stream());
});

gulp.task('serve', function() {
    /*browserSync.init({
        server: {
            baseDir: config.output.path
        }
        proxy:"mtproj.loc"
    });*/

    gulp.watch(config.path.scss, ['scss']);
    //gulp.watch(config.path.html).on('change', browserSync.reload);

});

gulp.task('default', ['scss', 'serve']);