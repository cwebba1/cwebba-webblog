(() => {

  'use strict';

  /**************** Gulp.js 4 configuration ****************/

  const

    // development or production
    devBuild  = ((process.env.NODE_ENV || 'development').trim().toLowerCase() === 'development'),

    // directory locations
    paths = {
  app: 'app/',
//  appHBS: 'app/pages/*.hbs',
  root: 'process.cwd()',
  appHTML: 'app/**/*.html',
  appCSS: 'app/css',
  appSCSS: 'app/scss',
  appJS: 'app/assets/js/**/*.js',
  appStage: 'app/assets/JSstage',
  dist: 'dist',
  distIndex: 'dist/index.html',
  distCSS: 'dist/css/',
  distJS: 'dist/assets/js',
  distIMG: 'dist/assets/images',
},

    // modules
    gulp          = require('gulp'),
    del           = require('del'),
    noop          = require('gulp-noop'),
    newer         = require('gulp-newer'),
    size          = require('gulp-size'),
    imagemin      = require('gulp-imagemin'),
    sass          = require('gulp-sass'),
    postcss       = require('gulp-postcss'),
    sourcemaps    = devBuild ? require('gulp-sourcemaps') : null,
    babel   = require('gulp-babel'),
    cache = require('gulp-cache'),
    concat  = require('gulp-concat'),
    gulpIf = require('gulp-if'),
    terser = require('gulp-terser'),
    useref = require('gulp-useref'),
    //    uglify  = require('gulp-uglify'),
//    handlebars = require('gulp-compile-handlebars'),
//    layouts = require('handlebars-layouts'),
    rename = require('gulp-rename'),
browserSync = require('browser-sync').create();


  console.log('Gulp', devBuild ? 'development' : 'production', 'build');

const { series } = require('gulp');

  /**************** reload task ****************/
  function reload(done){
  browserSync.reload();
  done();
}


// Static server
function browsersync() {
    browserSync.init({
        server: {
            baseDir: './app',
            index     : 'index.html'
        },
    port        : 8000,
    open        : false
    });
};


  /**************** Utility tasks ****************/

  // NEEDS DEVELOPMENT
  function copycss(done) {
  return gulp.src(paths.appCSS).pipe(gulp.dest(paths.dist));
  done();
};

  function copyhtml(done) {
  return gulp.src(paths.appHTML).pipe(useref())
  .pipe(gulp.dest(paths.dist));
  done();
};
  exports.copyhtml = copyhtml;

  // NEEDS DEVELOPMENT
  function copyjs(done) {
  return gulp.src(paths.appJS).pipe(gulp.dest(paths.dist));
  done();
};

//  gulp.task('copy', ['copyhtml', 'copycss', 'copyjs']);


  /**************** Cleaning Tasks ****************/
// Cleaning

// This Clear task deletes EVERYTHING in dest
 function clearDist(done) {
  return del.sync('dist');
  done();
};
  exports.clearDist = gulp.series(del, clearDist);


// Clean dist folder except images
//  function cleanDist(done) {
//  return del.sync(['dist/**/*', '!dist/images', '!dist/images/**/*']);
//  done();
//};
//  exports.cleanDist = gulp.series(del, cleanDist);

  function clean(done) {
    del(['dist/*html', 'dist/css/*.css', 'dist/assets/js/*.js', '!dist/assets/images/', '!dist/webprojects', '!dist/webprojects/*.+(png|jpg|gif|svg)', '!dist/css/iframe_pg.css',]);
     done();
};
  exports.clean = clean;


    function cleanscripts(done) {
    del(['app/assets/JSstage/**', '!app/assets/JSstage']);
     done(); 
};




  /**************** images task ****************/

  const imgConfig = {
    app           : paths.app + 'assets/images/**/*',
    dist         : paths.distIMG,

    minOpts: {
      optimizationLevel: 5
    }
  };

  function images() {

    return gulp.src(imgConfig.app)
      .pipe(newer(imgConfig.dist))
      .pipe(imagemin(imgConfig.minOpts))
      .pipe(size({ showFiles:true }))
      .pipe(gulp.dest(imgConfig.dist));

  }
  exports.images = images;


  /**************** CSS task ****************/

  const cssConfig = {

    app         : paths.app + 'scss/styles.scss',
    watch       : paths.app + 'scss/**/*',
    buildapp       : paths.appCSS,  // Changed from dist - need to copy to dist
    buildist       : paths.distCSS,  // Changed from dist - need to copy to dist
    sassOpts: {
      sourceMap       : devBuild,
      outputStyle     : 'expanded',
      imagePath       : '/assets/images/',
      precision       : 3,
      errLogToConsole : true
    },

    postCSS: [
      require('postcss-assets')({
        loadPaths: ['assets/images/'],
        basePath: paths.dist
      }),
      require('autoprefixer')()
    ]

  };

  // remove unused selectors and minify production CSS
  if (!devBuild) {

    cssConfig.postCSS.push(
      require('usedcss')({ html: ['index.html'] }),
      require('cssnano')
    );

  }

  function css() {

    return gulp.src(cssConfig.app)
      .pipe(sourcemaps ? sourcemaps.init() : noop())
      .pipe(sass(cssConfig.sassOpts).on('error', sass.logError))
      .pipe(postcss(cssConfig.postCSS))
      .pipe(sourcemaps ? sourcemaps.write() : noop())
      .pipe(size({ showFiles:true }))
      .pipe(gulp.dest(cssConfig.buildapp))
      .pipe(gulp.dest(cssConfig.buildist))
    pipe(browserSync.stream());

  }
  exports.css = gulp.series(images, css);

  /**************** Copy CSS to Root task ****************/

function copyCSS(done) {

  // Copy static files
gulp.src("./app/css/styles.css")
  .pipe(rename("app/css/style.css"))
  .pipe(gulp.dest(".")); // cwebba/style.css
  done();
}
  exports.copyCSS = copyCSS;
;


  /**************** Scripts task ****************/

  function scripts(done) {
  return gulp.src(paths.appJS, { sourcemaps: true })
    .pipe(babel())
    .pipe(terser())
    .pipe(gulp.dest(paths.appStage));
    done();
}
  exports.scripts = scripts;




  /**************** Handlebars task ****************/
/*
  const hbsConfig = {
    app         : paths.appHBS,
    watch       : paths.app + 'pages/*.hbs',
    build       : paths.appHTML,   // Changed from dist - need to copy to dist
}

function hbs() {
  return gulp.src('./app/pages/*.hbs')
    .pipe(handlebars({}, {
      ignorePartials: true,
      batch: ['./app/partials']
    }).on('error', function(e){
            console.log(e);
         }))
    .pipe(rename({
      extname: '.html'
    }))
    .pipe(gulp.dest('./app'))
    pipe(browserSync.stream());
}
exports.hbs = hbs;
*/

// HTML
  function html(done) {
  return gulp.src('app/*.html', { sourcemaps: true })
    .pipe(useref())
    // Minifies only if it's a JavaScript file
    .pipe(gulpIf('*.js', babel().on('error', function(e){
            console.log(e);
         })
    .pipe(terser()
    )))
    .pipe(gulp.dest('dist'))
done();
};
  exports.html = html;


  /**************** watch task ****************/

  function watch() {

    // image changes
    gulp.watch(imgConfig.app, series(images, reload));

    // CSS changes
    gulp.watch(cssConfig.watch, series(css, reload));

 //   gulp.watch(paths.appHBS, series(hbs, reload));
    // 053020 from Gulp tutorial    
    gulp.watch(paths.appJS, series(scripts, reload));
  }
  exports.watch = gulp.series(watch, reload);

  /**************** default task ****************/

  exports.default = gulp.series(cleanscripts, scripts, gulp.series(/*hbs,*/ gulp.series(clean, html), images, css, copyCSS, gulp.parallel(watch, browsersync )) );

})();
