// Import all plugins and gulp
var gulp = require('gulp'),
  watch = require('gulp-watch'),
  plumber = require('gulp-plumber'),
  prefixer = require('gulp-autoprefixer'),
  uglify = require('gulp-uglify'),
  sass = require('gulp-sass'),
  cssclean = require('gulp-clean-css'),
  sourcemaps = require('gulp-sourcemaps'),
  rigger = require('gulp-rigger'),
  imagemin = require('gulp-imagemin'),
  pngquant = require('imagemin-pngquant'),
  rimraf = require('rimraf'),
  connect = require('gulp-connect-php'),
  browserSync = require("browser-sync"),
  reload = browserSync.reload,
bootlint = require('gulp-bootlint'),
realFavicon = require('gulp-real-favicon'),
modernizr = require('gulp-modernizr'),
  fs = require('fs');
// Create object with all pathes
var path = {
  build: { // Where to put all compiled files
    html: 'build/',
    js: 'build/js/',
    css: 'build/css/',
    img: 'build/img/',
    fonts: 'build/fonts/',
    php: 'build/php/'
    //php: 'build/uploads/'
  },
  src: { // Where to get source from
    html: 'src/*.php',
    js: 'src/js/main.js',
    style: 'src/style/main.scss',
    img: 'src/img/**',
    fonts: 'src/fonts/**',
    php: 'src/php/**'
  },
  watch: { // Watching files
    html: 'src/**',
    js: 'src/js/**',
    style: 'src/style/**',
    img: 'src/img/*.*',
    fonts: 'src/fonts/**',
    php: 'src/php/*.php'

  },
  clean: './build'
};

// Set up dev server
var config = {
  //server: {
   // baseDir: ["./", "./build"]
  //},
  tunnel: true,
  //port: 9000,
  tunnel: true,
  proxy: 'vasyldemianiuk.host', // In conjuction with OpenServer (gulp-connect-php?)
  logPrefix: "WELES777"

};

// Running webserver (livereload)
gulp.task('webserver', function() {
  browserSync(config);
});

// Putting all HTML files together
gulp.task('html:build', function() {
  gulp.src(path.src.html)
    .pipe(rigger())
    .pipe(gulp.dest(path.build.html))
    .pipe(reload({ stream: true }));
});

// Putting all JS files together
gulp.task('js:build', function() {
  gulp.src(path.src.js)
    .pipe(rigger())
    .pipe(sourcemaps.init())
   .pipe(uglify())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(path.build.js))
    .pipe(reload({ stream: true }));
});



// Puting all  SCSS files together
gulp.task('style:build', function() {
  gulp.src(path.src.style)
    .pipe(sass().on('error', function(err) {
      console.error(err.message);
      browserSync.notify(err.message, 3000);
      this.emit('end');
    }))
    .pipe(sourcemaps.init())
    .pipe(plumber())
    .pipe(sass())
    .pipe(prefixer({
      browsers: ["Android 2.3",
        "Android >= 4",
        "Chrome >= 20",
        "Firefox >= 24",
        "Explorer >= 10",
        "iOS >= 6",
        "Opera >= 12",
        "Safari >= 6"
      ]
    }))
    .pipe(cssclean())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(path.build.css))
    .pipe(reload({ stream: true }));
});

// Puting all  images files together and compressing
gulp.task('image:build', function() {
  gulp.src(path.src.img)
    // .pipe(imagemin({
    //     progressive: true,
    //     svgoPlugins: [{removeViewBox: false}],
    //     use: [pngquant()],
    //     interlaced: true
    // }))
    .pipe(gulp.dest(path.build.img))
    .pipe(reload({ stream: true }));
});


// Moving fonts
gulp.task('fonts:build', function() {
  gulp.src(path.src.fonts)
    .pipe(gulp.dest(path.build.fonts))
});

// Include php
gulp.task('php:build', function() {
  gulp.src(path.src.php)
    //.pipe(rigger())
    //.pipe(uglify())
    .pipe(gulp.dest(path.build.php))
    .pipe(reload({ stream: true }));
});

// Run all plugins
gulp.task('build', [
  'html:build',
  'js:build',
  'style:build',
  'fonts:build',
  'image:build',
  'php:build'
]);




// Autocompilatin of plugins on change
gulp.task('watch', function() {
  watch([path.watch.html], function(event, cb) {
    gulp.start('html:build');
  });
  watch([path.watch.style], function(event, cb) {
    gulp.start('style:build');
  });
  watch([path.watch.js], function(event, cb) {
    gulp.start('js:build');
  });
  watch([path.watch.img], function(event, cb) {
    gulp.start('image:build');
  });
  watch([path.watch.fonts], function(event, cb) {
    gulp.start('fonts:build');
  });
  watch([path.watch.php], function(event, cb) {
    gulp.start('php:build');
 });
});


// Cleaning build folder
gulp.task('clean', function(cb) {
  rimraf(path.clean, cb);
});

// Set default task as 'gulp'
gulp.task('default', ['build', 'webserver', 'watch']);



// Build modernizr
gulp.task('modernizr', function(){
return gulp.src(path.src.js)
.pipe(modernizr('modernizr-build.js'))
.pipe(gulp.dest('src/js/vendor/'));
});
// Checking out bootstrap consistency
gulp.task('bootlint', function() {
  return gulp.src(path.src.html)
    .pipe(bootlint({
      stoponerror: true,
      stoponwarning: true,
      loglevel: 'debug',
      issues: fileIssues,
      reportFn: function(file, lint, isError, isWarning, errorLocation) {
        var message = (isError) ? "ERROR! - " : "WARN! - ";
        if (errorLocation) {
          message += file.path + ' (line:' + (errorLocation.line + 1) + ', col:' + (errorLocation.column + 1) + ') [' + lint.id + '] ' + lint.message;
        } else {
          message += file.path + ': ' + lint.id + ' ' + lint.message;
        }
        console.log(message);
      },
      summaryReportFn: function(file, errorCount, warningCount) {
        if (errorCount > 0 || warningCount > 0) {
          console.log("please fix the " + errorCount + " errors and " + warningCount + " warnings in " + file.path);
        } else {
          console.log("No problems found in " + file.path);
        }
      }
    }));
});

// Including Favicon for browsers,
// no idea how it works...

// File where the favicon markups are stored
var FAVICON_DATA_FILE = 'faviconData.json';

// Generate the icons. This task takes a few seconds to complete.
// You should run it at least once to create the icons. Then,
// you should run it whenever RealFaviconGenerator updates its
// package (see the check-for-favicon-update task below).
gulp.task('generate-favicon', function(done) {
  realFavicon.generateFavicon({
    masterPicture: 'src/img/logo.png',
    dest: 'build/img/icons',
    iconsPath: '/',
    design: {
      ios: {
        pictureAspect: 'noChange',
        assets: {
          ios6AndPriorIcons: false,
          ios7AndLaterIcons: true,
          precomposedIcons: true,
          declareOnlyDefaultIcon: true
        }
      },
      desktopBrowser: {},
      windows: {
        pictureAspect: 'whiteSilhouette',
        backgroundColor: '#ffc40d',
        onConflict: 'override',
        assets: {
          windows80Ie10Tile: false,
          windows10Ie11EdgeTiles: {
            small: false,
            medium: true,
            big: false,
            rectangle: false
          }
        }
      },
      androidChrome: {
        pictureAspect: 'backgroundAndMargin',
        margin: '23%',
        backgroundColor: '#d9d9d9',
        themeColor: '#d9d9d9',
        manifest: {
          name: 'title',
          display: 'standalone',
          orientation: 'notSet',
          onConflict: 'override',
          declared: true
        },
        assets: {
          legacyIcon: false,
          lowResolutionIcons: false
        }
      }
    },
    settings: {
      scalingAlgorithm: 'Mitchell',
      errorOnImageTooSmall: false
    },
    markupFile: FAVICON_DATA_FILE
  }, function() {
    done();
  });
});

// Inject the favicon markups in your HTML pages. You should run
// this task whenever you modify a page. You can keep this task
// as is or refactor your existing HTML pipeline.
gulp.task('inject-favicon-markups', function() {
  gulp.src(['src/*.html'])
    .pipe(realFavicon.injectFaviconMarkups(JSON.parse(fs.readFileSync(FAVICON_DATA_FILE)).favicon.html_code))
    .pipe(gulp.dest('build'));
});

// Check for updates on RealFaviconGenerator (think: Apple has just
// released a new Touch icon along with the latest version of iOS).
// Run this task from time to time. Ideally, make it part of your
// continuous integration system.
gulp.task('check-for-favicon-update', function(done) {
  var currentVersion = JSON.parse(fs.readFileSync(FAVICON_DATA_FILE)).version;
  realFavicon.checkForUpdates(currentVersion, function(err) {
    if (err) {
      throw err;
    }
  });
});

// Magic. Do not touch!
