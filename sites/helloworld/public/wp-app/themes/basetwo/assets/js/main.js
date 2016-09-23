import $ from 'jquery';
import ExampleClass from "./ExampleClass";

let e = new ExampleClass();
e.sayHello();

$(document).ready(() => {
   console.log('I am ready');
});
