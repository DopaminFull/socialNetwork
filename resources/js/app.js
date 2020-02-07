/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component("Follow", require("./components/follow.vue").default);
Vue.component("Search", require("./search/search.vue").default);
Vue.component("Notification", require("./components/notification.vue").default);
Vue.component("Feed", require("./feed/feed.vue").default);
Vue.component("Client", require("./client/client.vue").default);

/* Infinite-Scrolling START */
Vue.use(require('vue-resource'));
Vue.component('feed-loading', () => import('vue-infinite-loading')); // Lazy load it for better performance
/* Infinite-Scrolling END */

const app = new Vue({
    el: "#app"
});
