const gulp = require('gulp');
const fileInclude = require('gulp-file-include');
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');
const htmlmin = require('gulp-htmlmin');
const gulpIf = require('gulp-if');
const sitemap = require('gulp-sitemap');
const ignore = require('gulp-ignore');
const browserSync = require('browser-sync').create();

const isProd = process.env.NODE_ENV === 'production';

const paths = {
  html:     'src/pages/**/*.html',
  partials: 'src/partials/**/*.html',
  css:      'src/assets/css/**/*.css',
  js:       'src/assets/js/**/*.js',
  img:      'src/assets/img/**/*',
  fonts:    'src/assets/fonts/**/*',
  favicon:  'src/assets/favicon/**/*',
  static:   'src/static/**/*',
  dist:     'dist/'
};

// ---------- HTML ----------
function html() {
  return gulp.src(paths.html)
    .pipe(fileInclude({
      prefix: '@@',
      basepath: '@file'
    }))
    .pipe(gulpIf(isProd, htmlmin({
      collapseWhitespace: true,
      removeComments: true,
      minifyCSS: true,
      minifyJS: true
    })))
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

// ---------- IMG ----------
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

// ---------- STATIC (robots.txt и др.) ----------
function staticFiles() {
  return gulp.src(paths.static)
    .pipe(gulp.dest(paths.dist));
}

// ---------- SITEMAP (после html!) ----------
function seo() {
  return gulp.src('dist/**/*.html', { read: false })
    .pipe(ignore.exclude(['**/success.html', '**/404.html']))
    .pipe(sitemap({
      siteUrl: 'https://itlant.ru'
    }))
    .pipe(gulp.dest(paths.dist));
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
    port: 3000,
    ui: { port: 3001 }
  });

  gulp.watch([paths.html, paths.partials], html);
  gulp.watch(paths.css, css);
  gulp.watch(paths.js, js);
  gulp.watch(paths.img, img);
  gulp.watch(paths.static, staticFiles);
}

// ---------- TASKS ----------
const assets = gulp.parallel(html, css, js, img, fonts, favicon, staticFiles);
const build = gulp.series(clean, assets, seo);
const dev = gulp.series(clean, assets, serve);

exports.html        = html;
exports.css         = css;
exports.js          = js;
exports.img         = img;
exports.fonts       = fonts;
exports.favicon     = favicon;
exports.staticFiles = staticFiles;
exports.seo         = seo;
exports.clean       = clean;
exports.build       = build;
exports.default     = dev;