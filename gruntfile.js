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
		                'vendor',
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
	            textdomain: 'notification-slugnamexx'
	        },
	        target: {
	            files: {
	                src: [
	                    'notification-slugnamexx.php',
	                    './src/**/*.php',
	                ]
	            }
	        }
	    }

	} );

	grunt.loadNpmTasks( 'grunt-wp-i18n' );

	grunt.registerTask( 'textdomain', ['addtextdomain'] );

};
