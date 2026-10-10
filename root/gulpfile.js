const gulp = require('gulp');
const fileInclude = require('gulp-file-include');
const replace = require('gulp-replace');
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');
const browserSync = require('browser-sync').create();

const paths = {
  html:    'src/pages/**/*.html',
  partials:'src/partials/**/*.html',
  css:     'src/assets/css/**/*.css',
  js:      'src/assets/js/**/*.js',
  img:     'src/assets/img/**/*',
  fonts:   'src/assets/fonts/**/*',
  favicon: 'src/assets/favicon/**/*',
  dist:    'dist/'
};

// ---------- HTML ----------
function html() {
  return gulp.src(paths.html)
    .pipe(fileInclude({
      prefix: '@@',
      basepath: '@file',
      indent: true
    }))
    .pipe(replace(
      /<link[^>]*fonts\.googleapis[^>]*>/g,
      '<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=IBM+Plex+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">'
    ))
    .pipe(gulp.dest(paths.dist))
    .pipe(browserSync.stream());
}

// ---------- CSS ----------
function css() {
  return gulp.src(paths.css)
    .pipe(cleanCSS())
    .pipe(gulp.dest(paths.dist + 'assets/css'))
    .pipe(browserSync.stream());
}

// ---------- JS ----------
function js() {
  return gulp.src(paths.js)
    .pipe(uglify())
    .pipe(gulp.dest(paths.dist + 'assets/js'))
    .pipe(browserSync.stream());
}

// ---------- IMG (просто копирование) ----------
function img() {
  return gulp.src(paths.img)
    .pipe(gulp.dest(paths.dist + 'assets/img'));
}

// ---------- FONTS ----------
function fonts() {
  return gulp.src(paths.fonts)
    .pipe(gulp.dest(paths.dist + 'assets/fonts'));
}

// ---------- FAVICON ----------
function favicon() {
  return gulp.src(paths.favicon)
    .pipe(gulp.dest(paths.dist + 'assets/favicon'));
}

// ---------- CLEAN ----------
function clean(cb) {
  require('rimraf').sync('dist');
  cb();
}

// ---------- SERVE + WATCH ----------
function serve() {
  browserSync.init({
    server: { baseDir: 'dist' },
    notify: false,
    open: false,
    port: 3000
  });

  gulp.watch([paths.html, paths.partials], html);
  gulp.watch(paths.css, css);
  gulp.watch(paths.js, js);
  gulp.watch(paths.img, img);
}

// ---------- TASKS ----------
const build = gulp.parallel(html, css, js, img, fonts, favicon);
const dev = gulp.series(clean, build, serve);

exports.html = html;
exports.css = css;
exports.js = js;
exports.img = img;
exports.fonts = fonts;
exports.favicon = favicon;
exports.clean = clean;
exports.build = gulp.series(clean, build);
exports.default = dev;