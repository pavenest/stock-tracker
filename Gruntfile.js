/**************************************************
 * Grunt build script.
 * @description Automate several processes and compilations & build
 * @version 1.0.0
 * @author atiqsu
 * @organization Pavenest solutions
 **************************************************/

/**
 * Commands of lib
 *
 * grunt-wp-i18n :: addtextdomain, makepot
 *
 */

const scriptVersion = '1.0.0';


module.exports = function (grunt) {

    const appConfig = {
        name: 'stock-tracker',
        srcDir: './',
        dstDir: '../build/' + this.name + '/',
        tDom: 'stock-tracker',
        assetDir: 'assets/'
    }

    grunt.initConfig({
        checktextdomain: {
            standard: {
                options: {
                    text_domain: appConfig.tDom,
                    keywords: [
                        '__:1,2d',
                        '_e:1,2d',
                        '_x:1,2c,3d',
                        'esc_html__:1,2d',
                        'esc_html_e:1,2d',
                        'esc_html_x:1,2c,3d',
                        'esc_attr__:1,2d',
                        'esc_attr_e:1,2d',
                        'esc_attr_x:1,2c,3d',
                        '_ex:1,2c,3d',
                        '_n:1,2,4d',
                        '_nx:1,2,4c,5d',
                        '_n_noop:1,2,3d',
                        '_nx_noop:1,2,3c,4d'
                    ],
                },
                files: [{
                    src: ['**/*.php', '!node_modules/**'],
                    expand: true,
                }],
                files4: [{
                    src: [
                        appConfig.srcDir + '**/*.php',
                    ],
                    expand: true,
                }],
            },
        },

        addtextdomain: {
            options: {
                textdomain: appConfig.tDom,
                updateDomains: true
            },
            target: {
                files: {
                    src: [
                        appConfig.srcDir + '*.php',
                        '!node_modules/**',
                        '!' + appConfig.srcDir + 'tests/**',
                        appConfig.srcDir + '**/*.php',
                    ]
                }
            }
        },

        makepot: {
            target: {
                options: {
                    cwd: appConfig.srcDir,
                    domainPath: appConfig.srcDir + '/languages',
                    potFilename: 'languages.pot',
                    exclude: [],
                    include: [],
                    mainFile: '',
                    type: 'wp-plugin',
                    updateTimestamp: true,
                    updatePoFiles: true
                }
            }
        },

        sass: {
            dist: {
                options: {
                    style: 'expanded',
                    sourceMap: false,
                },
                files: [{
                    expand: true,
                    cwd: 'resource/scss',
                    src: ['*.scss'],
                    dest: appConfig.assetDir+'css',
                    ext: '.css'
                }]

            }
        }
    });

    require('jit-grunt')(grunt);

    grunt.loadNpmTasks('grunt-wp-i18n');
    grunt.loadNpmTasks('grunt-checktextdomain');
    grunt.loadNpmTasks('grunt-contrib-sass');

    grunt.registerTask('fix-tdom', [
        'addtextdomain',
        'checktextdomain'
    ]);

    grunt.registerTask('pot-build', [
        'makepot',
    ]);

    grunt.registerTask('compile-css', [
        'sass',
    ]);
}
