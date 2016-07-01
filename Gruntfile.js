module.exports = function(grunt) {




  grunt.initConfig({
 	  pkg: grunt.file.readJSON('package.json'),
    concat: {
     	js: {
     	options: {
     	separator: ';'
     	},
     	src: [
     	'_DEV/js/jquery-2.2.4.min.js',
     	'_DEV/js/main.js',
      '_DEV/js/**/*.js'
     	],
     	dest: 'public/wp-content/themes/advProjBoiler/js/main.min.js'
     	},
     	},
    uglify: {
     	options: {
     	mangle: false
     	},
     	js: {
     	files: {
     	'public/wp-content/themes/advProjBoiler/js/main.min.js': ['public/wp-content/themes/advProjBoiler/js/main.min.js']
     	}
     	}
      },
    sass: {
     	dist: {
     	options: {
     	style: 'compressed'
     	},
     	files: {
     	'public/wp-content/themes/advProjBoiler/css/css.css' : '_DEV/scss/css.scss'
     	}
     	}
     	},
    watch: {
     	options: {
     	livereload: true,
     	},
     	html: {
     	files: ['public/themes/**/*.html']
     	},
     	php: {
     	files: ['public/themes/**/*.php']
     	},
     	js: {
      files: ['_DEV/js/**/*.js'],
      tasks: ['concat:js', 'uglify:js'],
      },
     	css: {
     	files: ['_DEV/scss/**/*.scss'],
     	tasks: ['sass']
     	}
     	}


 });
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.registerTask('default',['watch']);
};
