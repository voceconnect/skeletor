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
        "js/script.js"
      ],
    },
    "uglify": {
      "theme": {
        "options": {
          "preserveComments": "some"
        },
        "files": {
          "js/skeletor.min.js": [
            "js/script.js",
            "js/skip-link-focus-fix.js"
          ],
          "js/libs/bootstrap.min.js": [
            "js/bootstrap/**/*.js",
            "!js/bootstrap/popover.js",
            "js/bootstrap/popover.js"
          ]
        }
      }
    },
    "concat": {
      "bootstrap": {
        "src": [
          "js/bootstrap/**/*.js",
          "!js/bootstrap/popover.js",
          "js/bootstrap/popover.js"
        ],
        "dest": "js/libs/bootstrap.js"
      },
      "main": {
        "src": [
          "js/*.js"
        ],
        "dest": "js/skeletor.js"
      }
    },
    "imagemin": {
      "theme": {
        "files": [
          {
            "expand": true,
            "cwd": "images/",
            "src": "**/*.{png,jpg}",
            "dest": "images/"
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
    "watch": {
      "scripts": {
        "files": "js/**/*.js",
        "tasks": ["jshint", "concat"]
      },
      "images": {
        "files": "images/**/*.{png,jpg,gif}",
        "tasks": ["imagemin"]
      },
      "composer": {
        "files": "composer.json",
        "tasks": ["composer:update"]
      },
      "styles": {
        "files": "sass/**/*.scss",
        "tasks": ["compass"]
      }
    },
    "build": {
      "production": ["uglify", "composer:install:no-dev:optimize-autoloader", "compass:production"],
      "uat": ["uglify", "composer:install:no-dev:optimize-autoloader", "compass:production"],
      "staging": ["concat", "composer:install", "compass:development"],
      "development": ["concat", "composer:install", "compass:development"]
    }
  });

  //load the tasks
  grunt.loadNpmTasks('grunt-voce-plugins');

  //set the default task as the development build
  grunt.registerTask('default', ['build:development']);

};