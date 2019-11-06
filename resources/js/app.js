/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import App from './views/App'

import Home from './views/Signatures'
import SignatureForm from './views/SignatureForm'
import SignatureShow from './views/SignatureShow'

import Screens from './views/Screens'
import ScreenForm from './views/ScreenForm'
import ScreenShow from './views/ScreenShow'


const router = new VueRouter({
	mode: 'history',
	routes: [
	    {
	     	path: '/',
	      	name: 'home',
	      	component: Home
	    },
	    {
	      	path: '/sign',
	      	name: 'signature-form',
	      	component: SignatureForm,
	    },
	    {
	      	path: '/signature/:id',
	      	name: 'signature.show',
	      	component: SignatureShow,
	    },
	    // Site Screens
	    {
	      	path: '/screens',
	      	name: 'screens',
	      	component: Screens,
	    },
	    {
	      	path: '/screen/add',
	      	name: 'screen-form',
	      	component: ScreenForm,
	    },
	    {
	      	path: '/screen/:id',
	      	name: 'screen.show',
	      	component: ScreenShow,
	    },
	],
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('paginate', require('vuejs-paginate').default);
Vue.component('app-nav', require('./components/Appnav.vue').default);
Vue.component('app-event', require('./components/AppEvent.vue').default);
Vue.component('app-feature', require('./components/AppFeature.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: { App },
  	router,
});
