
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

var example = Vue.component('example-component', require('./components/ExampleComponent.vue').default);

var pageProfile = Vue.component('page-profile', require('./components/page/Profile.vue').default);
var pageLogin = Vue.component('page-login', require('./components/page/Login.vue').default);
var pageRegister = Vue.component('page-register', require('./components/page/Register.vue').default);
var pageHome = Vue.component('page-home', require('./components/page/Home.vue').default);
var pageAdmin = Vue.component('page-admin', require('./components/page/Admin.vue').default);
var pageBossDetail = Vue.component('page-boss-detail', require('./components/page/BossDetail.vue').default);

Vue.component('error-alert', require('./components/inc/ErrorAlert.vue').default);
Vue.component('inc-navbar', require('./components/inc/Navbar.vue').default);
Vue.component('inc-modal', require('./components/inc/Modal.vue').default);
Vue.component('inc-footer', require('./components/inc/Footer.vue').default);

Vue.component('modal-boss', require('./components/modal/Boss.vue').default);
Vue.component('modal-skill', require('./components/modal/Skill.vue').default);

Vue.component('ui-simple-data-grid', require('./components/ui/SimpleDataGrid.vue').default);
Vue.component('ui-boss-result-table', require('./components/ui/BossResultTable.vue').default);
Vue.component('ui-boss-profile', require('./components/ui/BossProfile.vue').default);

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
    { path : '/login', component: pageLogin, meta:  {bodyClass : 'hold-transition login-page'} },    
    { path : '/register', component: pageRegister, meta : {bodyClass: 'hold-transition register-page'} },
    { path : '/home', component: pageHome, meta : {bodyClass: 'skin-purple-light layout-top-nav'} },
    { path : '/admin', component: pageAdmin, meta : {bodyClass: 'skin-purple-light layout-top-nav'} },    
    { path : '/boss/:id', component: pageBossDetail, meta : {bodyClass: 'skin-purple-light layout-top-nav'} },    
];

const router = new VueRouter({
    routes // short for `   routes: routes`
});

import VuexPersist from 'vuex-persist'

const vuexPersist = new VuexPersist({
    key: 'rate-my-boss',
    storage: localStorage
});


import ProfileStore from './vuex/profile-store';
import GlobalStore from './vuex/global-store';
import BossStore from './vuex/boss-store';
import SkillStore from './vuex/skill-store';
import GridStore from './vuex/grid-store';

const store = new Vuex.Store({
    modules: {
      profile: ProfileStore,
      global: GlobalStore,
      boss: BossStore,
      skill: SkillStore,
      grid: GridStore
    },
    plugins: [vuexPersist.plugin]
});

router.beforeEach((to, from, next) => {
    store.dispatch('global/hideAlert', {});
    next();
});

import './ml';

import BlockUI from 'vue-blockui'
import vbclass from 'vue-body-class';
import VueTheMask from 'vue-the-mask';
import VueBootstrapTypeahead from 'vue-bootstrap-typeahead'

Vue.component('vue-bootstrap-typeahead', VueBootstrapTypeahead)
Vue.use(VueTheMask);
Vue.use( vbclass, router  )
Vue.use(BlockUI)

const app = new Vue({   
    el: '#app',    
    router: router,
    store : store
});
