/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import 'flowbite';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);



document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('defaultModalButton').click();
});




// Loading Effect

// Wait for the DOM content to load
document.addEventListener("DOMContentLoaded", function() {
    // Select all HTML elements except for the loader
    const elementsToHide = document.querySelectorAll("body > :not(.loader)");
  
    // Select the loader element
    const loader = document.querySelector(".loader");
  
    // Hide all elements except for the loader
    elementsToHide.forEach(function(element) {
      element.style.display = "none";
    });
  
    // Function to show all elements and hide the loader after 5 seconds
    function showElements() {
      setTimeout(function() {
        elementsToHide.forEach(function(element) {
          element.style.display = "";
        });
        loader.style.display = "none";
      }, 2000);
    }
  
    // Call the showElements function to initiate the loading effect
    showElements();
  });




  // Alert Effect

  const element = document.getElementById('alert');
  const sectionAlert = document.getElementsByClassName('sectionAfterAlert')[0];
  
  // Remove the element after a delay of 5 seconds
  setTimeout(() => {
    if (element) {
      sectionAlert.style.marginTop = '-77px';
    }
  }, 5000);
  



  
  
  
  
  
  

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */





app.mount('#app');
