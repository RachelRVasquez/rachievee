module.exports = function( grunt ) {
	'use strict';

	require( 'load-grunt-tasks' )( grunt );

	grunt.registerTask( 'styles', [ 'sass', 'postcss', 'cssmin' ], function() {
		grunt.config( 'sass', {
			options: {
				sourceMap: true
			}, dist: {
				files: {
					'./dist/css/main.css'           : './src/sass/main.scss',
				}
			}
		} );

		grunt.config( 'postcss', {
			options: {
				map: true,
				processors: [
					require( 'autoprefixer' ),
				]
			}, dist: {
				src: './dist/css/*.css'
			}
		} );

		grunt.config( 'cssmin', {
			target: {
				files: [
					{
						expand: true,
						cwd   : 'dist/css',
						src   : [ '*.css', '!*.min.css' ],
						dest  : 'dist/css',
						ext   : '.min.css'
					}
				]
			}
		} );

		grunt.loadNpmTasks( 'grunt-postcss' );
		grunt.loadNpmTasks( 'grunt-contrib-cssmin' );
		grunt.task.run( [ 'sass', 'postcss', 'cssmin' ] );
	} );

	grunt.registerTask( 'js', [ 'uglify' ], function() {
		grunt.config( 'uglify', {
			options     : {
				mangle: {
					reserved: [ 'jQuery' ]
				}
			}, my_target: {
				files: {
					'./dist/js/main.min.js': [ './src/js/navigation.js', './src/js/skip-link-focus-fix.js', './dist/js/main.js' ],
					'./dist/js/main-admin.min.js': [ './src/js/customizer.js' ],
				}
			}
		} );

		grunt.loadNpmTasks( 'grunt-contrib-uglify' );
		grunt.task.run( [ 'uglify' ] );
	} );

	grunt.registerTask( 'watch', [ 'watch' ], function() {
		grunt.config( 'watch', {
			scripts  : {
				files: [ './src/**/*.js' ], tasks: [ 'js' ], options: {
					spawn: false
				}
			}, styles: {
				files: [ './src/**/*.scss' ], tasks: [ 'styles' ], options: {
					spawn: false
				}
			}
		} );
		grunt.loadNpmTasks( 'grunt-contrib-watch' );
		grunt.task.run( 'watch' );
	} );

	grunt.initConfig( {
		pkg: grunt.file.readJSON( 'package.json' )
	} );

	grunt.registerTask( 'default', [ 'styles', 'js' ] );
};
