require('./bootstrap');
const Echo = require("laravel-echo");
const messageComponent = require("./components/MessageComponent");
const Vue = require("vue").default;
window.Vue = require('vue').default;

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


//Vue.component('message-component', require('./components/MessageComponent').default);


import MessageComponent from "./components/MessageComponent";

const app = new Vue({
    el: '#app',
    components: {
        'message-component': MessageComponent
    }
});

