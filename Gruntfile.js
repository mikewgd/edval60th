module.exports = function(grunt) {
    
    /* Configuration */
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        compass: {
            dist: {
                options: {
                    sassDir: 'scss',
                    cssDir: 'css',
                    outputStyle: 'compressed'
                }
            }
        },

        copy: {
            main: {
                expand: true,
                cwd: 'css/imports/pages/',
                src: ['**/*'], 
                dest: 'css/pages/',
                flatten: true,
                filter: 'isFile'
            }
        },

        clean: ['css/imports'],

        concat: {
            options: {
                separator: '\n\n'
            },
            dist: {
                src: ['js/libs/*.js', 'js/src/*.js'],
                dest: 'js/scripts.js'
            }
        },

        uglify: {
            dist: {
                files: {
                  'js/scripts.min.js': ['<%= concat.dist.dest %>']
                }
            }
        },

        browserSync: {
            dev: {
                bsFiles: {
                    src : ['css/*.css', 'js/**/*.js', '*.php', 'includes/*.php']
                },
                options: {
                    watchTask: true,
                    proxy: "edval60th.local.com"
                }
            }
        },

        watch: {
            css: {
                files: "scss/**/*.scss",
                tasks: ['compass', 'copy', 'clean']
            },
            
            js: {
                files: ['js/libs/*.js', 'js/src/*.js'],
                tasks: ['concat', 'uglify']
            }
        },

        'ftp-deploy': {
            build: {
                auth: {
                    host: 'mikewgd.com',
                    port: 21,
                    authKey: 'config',
                    authPath: 'config.json'
                },
                src: '/Applications/MAMP/htdocs/edval60th',
                dest: '/edval60th.com',
                exclusions: ['**/.DS_Store', '**/Thumbs.db', 'node_modules', 'Gruntfile.js', 'package.json', 'config.json', 'config-base.json', 'includes/co-base.php', 'README.md', 'scss', '.sass-cache', 'img/uploads', '.git', '.gitignore']
            }
        }
    });
    
    /* Load Tasks */
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-browser-sync');
    grunt.loadNpmTasks('grunt-ftp-deploy');

    /* Individual Tasks */
    grunt.registerTask('default', ['browserSync', 'watch', 'copy', 'clean']);
    grunt.registerTask('deploy', ['compass', 'copy', 'clean', 'concat', 'uglify', 'ftp-deploy']); // FTP deploy
};
