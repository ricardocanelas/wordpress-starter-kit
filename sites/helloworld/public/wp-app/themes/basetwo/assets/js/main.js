// import $ from 'jquery';
import ExampleClass from "./ExampleClass";

window.$ = window.jQuery = require('jquery');
// var Bootstrap = require('bootstrap-sass');
// Bootstrap.$ = $;
require('bootstrap-sass/assets/javascripts/bootstrap');


let e = new ExampleClass();
e.sayHello();

$(document).ready(() => {
   console.log('I am ready');
   $('[data-toggle="tooltip"]').tooltip();
});

