module.exports = function(grunt) {

    //Initializing the configuration object
    grunt.initConfig({

        // Task configuration
        copy: {  
            main: {
                files: [
                    {
                        expand: true,
                        flatten: true,
                        src: ['bower_components/fontawesome/fonts/*'], 
                        dest: 'public/assets/fonts/', 
                        filter: 'isFile'
                    },
                    {
                        expand: true,
                        flatten: true,
                        src: ['bower_components/bootstrap/fonts/*'], 
                        dest: 'public/assets/fonts/', 
                        filter: 'isFile'
                    }
                ]
            }
        },

        less: {
            development: {
                options: {
                    compress: true,
                    cleancss: true,
                    strictImports: true
                },
                files: {
                    "./public/assets/stylesheets/blood.css": "./app/assets/stylesheets/blood.less"
                }
            }
        },

        concat: {
            options: {
                separator: ';\n',
            },
            js_frontend: {
                src: [
                    './bower_components/jquery/dist/jquery.min.js',
                    './bower_components/bootstrap/dist/js/bootstrap.js',
                    './app/assets/javascript/blood.js'
                ],
                dest: './public/assets/javascript/blood.js'
            }
        },

        uglify: {
            options: {
                mangle: false  // Use if you want the names of your functions and variables unchanged
            },
            frontend: {
                files: {
                    './public/assets/javascript/dm.js': './public/assets/javascript/dm.js',
                }
            }
        },

        watch: {
            js_frontend: {
                files: ['./app/assets/javascript/*.js'],   
                tasks: ['concat:js_frontend'],
                options: {
                    livereload: true
                }
            },

            less: {
                files: ['./app/assets/stylesheets/*.less'],
                tasks: ['less'],
                options: {
                    livereload: true
                }
            }
        },

        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'public/',
                    src: ['**/*.{png,jpg,gif}']
                }]
            }
        },

        'cache-busting': {
            css: {
                replace: ['app/views/header.blade.php'],
                replacement: 'blood.css',
                file: 'public/assets/stylesheets/blood.css',
                cleanup: true
            },
            js: {
                replace: ['app/views/scripts.blade.php'],
                replacement: 'blood.js',
                file: 'public/assets/javascript/blood.js',
                cleanup: true
            }
        },

        cssmin: {
            combine: {
                files: {
                    'public/assets/stylesheets/blood.css': ['public/assets/stylesheets/blood.css']
                }
            }
        }

    });

    // Plugin loading
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-cache-busting');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    // Task definition
    grunt.registerTask('production', ['copy', 'less', 'concat', 'uglify', 'cssmin' ,'cache-busting']);
    grunt.registerTask('default', ['watch']);

};