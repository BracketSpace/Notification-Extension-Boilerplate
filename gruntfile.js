module.exports = function(grunt) {

	grunt.initConfig( {

		makepot: {
	        target: {
	            options: {
	                cwd: '.',
	                domainPath: 'languages',
	                mainFile: 'notification-slugnamexx.php',
	                exclude: [
		                'node_modules/',
		                'assets',
		                'bin',
		                'tests',
		                '.git/'
		            ],
	                potHeaders: {
	                    poedit: true,
	                    'x-poedit-keywordslist': true
	                },
	                type: 'wp-plugin',
	                updatePoFiles: true
	            }
	        }
	    },

	    addtextdomain: {
	        options: {
	            textdomain: 'slugnamexx'
	        },
	        target: {
	            files: {
	                src: [
	                    'notification-slugnamexx.php',
	                    './inc/**/*.php',
	                    './class/**/*.php',
	                    './views/**/*.php'
	                ]
	            }
	        }
	    }

	} );

	grunt.loadNpmTasks( 'grunt-wp-i18n' );

	grunt.registerTask( 'textdomain', ['addtextdomain'] );

};
