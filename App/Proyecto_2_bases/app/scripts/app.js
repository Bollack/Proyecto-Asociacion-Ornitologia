'use strict';

/**
 * @ngdoc overview
 * @name proyectoOrnitocologiaAsociacionApp
 * @description
 * # proyectoOrnitocologiaAsociacionApp
 *
 * Main module of the application.
 */
angular
  .module('proyectoOrnitocologiaAsociacionApp', [
    'ngAnimate',
    'ngAria',
    'ngCookies',
    'ngMessages',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch'
  ])
  .config(function ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl'
      })
      .when('/about', {
        templateUrl: 'views/about.html',
        controller: 'AboutCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });
  });
