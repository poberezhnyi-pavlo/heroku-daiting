/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');

import {ServerTable, ClientTable, Event} from 'vue-tables-2';
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
Vue.use(ServerTable);
Vue.use(VueToast);

// VueSweetalert2
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);

import vuescroll from 'vuescroll';
Vue.use(vuescroll);

import VueEasyLightbox from 'vue-easy-lightbox';
Vue.use(VueEasyLightbox);

import VueYouTube from 'vue-youtube';
Vue.use(VueYouTube);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('users-component', require('./components/admin/UsersComponent.vue').default);
Vue.component('spinner-component', require('./components/admin/SpinnerComponent.vue').default);
Vue.component('settings-form-component', require('./components/admin/SettingsFormComponent').default);
Vue.component('draggable-images', require('./components/admin/DraggableImages').default);
Vue.component('homepage-slides', require('./components/admin/homepageSlide/HomepageSlides').default);
Vue.component('homepage-slide-form', require('./components/admin/homepageSlide/HomepageSlideNewForm').default);
Vue.component('delete-slide-button', require('./components/admin/homepageSlide/Buttons/DeleteSlideButton').default);
Vue.component('messages-layout', require('./components/admin/messages/MessagesLayout').default);
Vue.component('chat-component', require('./components/user/messages/ChatComponent').default);
Vue.component('messages-component', require('./components/user/messages/MessagesComponent').default);
Vue.component('woman-scroll', require('./components/user/main/ScrollWomanComponent').default);
Vue.component('image-component', require('./components/user/main/Gallery/ImageComponent').default);
Vue.component('video-component', require('./components/user/main/Gallery/VideoComponent').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.prototype.$locales = window.locales; //Add existed locales

const app = new Vue({
    el: '#app',
});
