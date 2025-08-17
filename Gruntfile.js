/* eslint-env node, es6 */
module.exports = function ( grunt ) {
	grunt.loadNpmTasks( 'grunt-banana-checker' );
	grunt.loadNpmTasks( 'grunt-eslint' );

	grunt.initConfig( {
		banana: {
			all: 'i18n/*'
		},
		eslint: {
			options: {
				cache: true
			},
			all: [
				'**/*.{js,json}',
				'!node_modules/**',
				'!vendor/**'
			],
			fix: {
				options: {
					fix: true
				},
				src: [
					'**/*.{js,json}',
					'!node_modules/**',
					'!vendor/**'
				]
			}
		}
	} );

	grunt.registerTask( 'test', [ 'eslint:all', 'banana' ] );
	grunt.registerTask( 'fix', [ 'eslint:fix' ] );
	grunt.registerTask( 'default', 'test' );
};
