/*
 * <%= projectName %>
 * https://github.com/voceconnect/<%= projectSlug %>
 */

'use strict';

module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    "jshint": {
      "options": {
        "curly": true,
        "eqeqeq": true,
        "eqnull": true,
        "browser": true,
        "plusplus": true,
        "undef": true,
        "unused": true,
        "trailing": true,
        "globals": {
          "jQuery": true,
          "$": true,
          "ajaxurl": true
        }
      },
      "theme": [
        "js/main.js"
      ],
    },
    "uglify": {
      "theme": {
        "options": {
          "preserveComments": "some"
        },
        "files": {
          "js/main.min.js": [
            "js/main.js",
            "js/skip-link-focus-fix.js"
          ],
          "js/libs/bootstrap.min.js": [
            "js/libs/bootstrap/**/*.js",
            "!js/libs/bootstrap/popover.js",
            "js/libs/bootstrap/popover.js"
          ]
        }
      }
    },
    "concat": {
      "bootstrap": {
        "src": [
          "js/libs/bootstrap/**/*.js",
          "!js/libs/bootstrap/popover.js",
          "js/libs/bootstrap/popover.js"
        ],
        "dest": "js/libs/bootstrap.js"
      },
      "main": {
        "src": [
          "js/main.js",
          "js/skip-link-focus-fix.js"
        ],
        "dest": "js/main.min.js"
      }
    },
    "imagemin": {
      "theme": {
        "files": [
          {
            "expand": true,
            "cwd": "img/",
            "src": "**/*.{png,jpg}",
            "dest": "img/"
          }
        ]
      }
    },
    "compass": {
      "options": {
        "config": "./config.rb",
        "basePath": "./",
        "force": true
      },
      "production": {
        "options": {
          "environment": "production"
        }
      },
      "development": {
        "options": {
          "environment": "development"
        }
      }
    },
    "autoprefixer": {
      "multiple_files": {
        "src": "./*.css"
      }
    },
    "watch": {
      "scripts": {
        "files": "js/**/*.js",
        "tasks": ["jshint", "concat"]
      },
      "images": {
        "files": "img/**/*.{png,jpg,gif}",
        "tasks": ["imagemin"]
      },
      "composer": {
        "files": "composer.json",
        "tasks": ["composer:update"]
      },
      "styles": {
        "files": "sass/**/*.scss",
        "tasks": ["compass:development", "autoprefixer"]
      }
    },
    "build": {
      "production": ["uglify", "composer:install:no-dev:optimize-autoloader", "compass:production", "autoprefixer"],
      "uat": ["uglify", "composer:install:no-dev:optimize-autoloader", "compass:production", "autoprefixer"],
      "staging": ["concat", "composer:install", "compass:development", "autoprefixer"],
      "development": ["concat", "composer:install", "compass:development", "autoprefixer"]
    }
  });

  //load the tasks
  grunt.loadNpmTasks('grunt-voce-plugins');
  grunt.loadNpmTasks('grunt-autoprefixer');

  //set the default task as the development build
  grunt.registerTask('default', ['build:development']);

};
