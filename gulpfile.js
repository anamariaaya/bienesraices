const {src, dest, watch, parallel, series} = require('gulp');
 
 
//css
const sass = require('gulp-sass')(require('sass'));
const cssnano = require('cssnano');
const postcss = require('gulp-postcss');
//js
const autoPrefixer = require('autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const terser = require('gulp-terser-js');
//img
const webp =require('gulp-webp');
const imagemin = require('gulp-imagemin');
const cache = require('gulp-cache');
const avif = require('gulp-avif');
//svg
const svg = require('gulp-svgmin');
const rename = require('gulp-rename');
 
const path = {
    scss: 'src/scss/**/*.scss',
    css: 'build/css/app.css',
    js: 'src/js/**/*.js',
    img: 'src/img/**/*.{jpg,png}',
    imgmin: 'build/img/**/*.{jpg,png}',
    svg: 'src/img/**/*.svg'
}
 
 
function compileSass(done) {
    src(path.scss)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([autoPrefixer(),cssnano()]))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('build/css'));
    done();
}
 
function compileJS(done){
    src(path.js)
        .pipe(sourcemaps.init())
        .pipe(concat('bundle.js'))
        .pipe(terser())
        .pipe(sourcemaps.write('.'))
        .pipe(rename({suffix: '.min'}))
        .pipe(dest('build/js'));
    done();
}
 
 
function imageMin(done){
    const settings= {
        optimizationLevel:3
    }
 
    src(path.img)
        .pipe(cache(imagemin(settings)))
        .pipe(dest('build/img'));
    done();
}
 
 
function imgWebp(done){
 
    const settings={
        quality:50
    }
 
    src(path.img)
        .pipe(webp(settings))
        .pipe(dest('build/img'));
    done()
}
 
 
function imgAvif(done){
    const settings = {
        quality:50
    }
 
    src(path.img)
        .pipe(avif(settings))
        .pipe(dest('build/img'));
    done();
}
 
 
function imgSvg(done){
    src(path.svg)
        .pipe(svg())
        .pipe(dest('build/img'));
    done();
}
 
 
function autoCompile(){
    watch(path.scss,compileSass);
    watch(path.js, compileJS);
    watch(path.img, parallel(imgAvif,imgWebp,imageMin));
}
 
exports.default = parallel(compileSass,compileJS,autoCompile,imgAvif,imageMin,imgWebp, imgSvg);