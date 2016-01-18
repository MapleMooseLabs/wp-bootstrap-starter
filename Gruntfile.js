'use strict';

module.exports = function(grunt) {
  require('load-grunt-tasks')(grunt);
  require('time-grunt')(grunt);

  grunt.registerTask('default', ['sass:style', 'uglify:js', 'watch']);

  grunt.initConfig({
    uglify: {
      options: {
        mangle: false
      },
      js: {
        files: {
          'js/main.min.js': ['src/js/main.js']
        }
      }
    },
    sass: {
      style: {
        options: {
          outputStyle: 'compressed',
          sourceMap: true
        },
        files: {
          "css/main.css": "src/scss/main.scss"
        }
      }
    }, // sass
    postcss: {
      options: {
        map: true,
        processors: [
          require('autoprefixer')({
            browsers: ['last 4 versions', 'Firefox ESR', 'Opera 12.1']
          })
        ]
      },
      no_dest_multiple: {
        src: 'css/*.css'
      }
    }, // postcss
    watch: {
      js: {
        files: ['src/js/**/*.js', 'js/vendor/**/*.js'],
        tasks: ['uglify:js'],
        options: {
          interrupt: true
        }
      },
      css: {
        files: ['src/scss/**/*.scss'],
        tasks: ['sass:style', 'postcss:no_dest_multiple'],
        options: {
          interrupt: true
        }
      }
    }
  }); // grunt.initConfig()
}
