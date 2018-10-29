require('./bootstrap');

window.Vue = require('vue');
window.Event = new Vue;
window.axios = axios;



import App from './components/App';
import Home from './components/Home';
import Login from './components/Login';
import Register from './components/Register';
import Dashboard from './components/Dashboard';
import VueRouter from 'vue-router';
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);


const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/',
            component: Home
        },
        {
            path: '/login',
            component: Login
        },
        {
            path: '/register',
            component: Register
        },
        //This is the main page route after the user is logged in
        {
            path: '/dashboard',
            component: Dashboard
        },
    ]
})

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    template: '<App/>',
    router
});