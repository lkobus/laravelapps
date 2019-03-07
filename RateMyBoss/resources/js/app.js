
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');



var Inputmask = require('inputmask');
window.$ = require('jquery');
window.Vue = require('vue');
window.Vuex = require('vuex');
import VueRouter from 'vue-router';
Vue.use(VueRouter);
Vue.use(Vuex);

Vue.directive('input-mask', {
    bind: function(el){
        new Inputmask().mask(el);
    }
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

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
var pageProfile = Vue.component('page-profile', require('./components/page/Profile.vue').default);
var pageLogin = Vue.component('page-login', require('./components/page/Login.vue').default);
Vue.component('app-rmb', require('./components/app/RMB.vue').default);
Vue.component('passport-clients', require('./components/passport/Clients.vue').default);
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue').default);
Vue.component('passport-personal-access-tokens',require('./components/passport/PersonalAccessTokens.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const routes = [
    { path : '/', component: pageLogin, meta:  {bodyClass : 'hold-transition login-page'} },
    { path : '/#/', component: pageLogin }
    
];

const router = new VueRouter({
    routes // short for `   routes: routes`
  })

import ProfileStore from './vuex/profile-store';
import GlobalStore from './vuex/global-store';

const store = new Vuex.Store({
    modules: {
      profile: ProfileStore,
      global: GlobalStore
    }
});
  

import './ml';

import BlockUI from 'vue-blockui'
import vbclass from 'vue-body-class';
Vue.use( vbclass, router  )
Vue.use(BlockUI)

const app = new Vue({   
    el: '#app',    
    router: router,
    store : store
});
