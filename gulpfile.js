const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));

async function compileSass() {
    const autoprefixer = (await import('gulp-autoprefixer')).default;
    const stripCssComments = (await import('gulp-strip-css-comments')).default;
    const cleanCSS = require('gulp-clean-css');

    return src('assets/css/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            overrideBrowserslist: ['last 2 versions'],
            cascade: false
        }))
        .pipe(stripCssComments()) // Remove comments from CSS
        .pipe(cleanCSS({ compatibility: 'ie11' })) // Minify CSS
        .pipe(dest('assets/css'));
}

function watchFiles() {
    watch('assets/css/**/*.scss', compileSass);
}

exports.default = series(compileSass, watchFiles);
