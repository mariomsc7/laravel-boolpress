/**
 * FRONT OFFICE
 */

require('./bootstrap');

window.Vue = require('vue');

import App from './App.vue';

const root = new Vue({
    el: '#root',
    render: h  => h(App) // function per hookkare il componente
});