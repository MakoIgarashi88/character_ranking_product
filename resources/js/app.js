/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vuetify from 'vuetify';
Vue.use(Vuetify);

window.Vue = require('vue').default;
import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './router'
Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// グローバルコンポーネント
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('main-component', require('./components/MainComponent.vue').default);
Vue.component('IconLg', require('./components/commons/icons/IconLg.vue').default);
Vue.component('IconSm', require('./components/commons/icons/IconSm.vue').default);
Vue.component('CharaCard', require('./components/commons/CharacterCard.vue').default);
Vue.component('CharaComment', require('./components/commons/CharacterComment.vue').default);
Vue.component('Loading', require('./components/commons/Loading.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify({
        customVariables: ['~/assets/sass/variables.scss'],
        iconfont: 'mdi',
        theme: {
            themes: {
                light: {
                    primary: '#E64A19',
                    secondary: '#FF5722',
                    // primary: '#ef7023',
                    // secondary: '#40A3C1',
                    accent: '#42A5F5',
                    error: '#b71c1c',
                },
            },
        },
    }),
});
