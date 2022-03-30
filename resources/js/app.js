require('./bootstrap');
import {createApp} from 'vue';
// import Vue from 'vue';
import { createRouter , createWebHistory} from 'vue-router';
import Toaster from "@meforma/vue-toaster";

import Vuex from './router/index.js';
import store from './store/index.js';
import routes from './router/index.js';

const router = createRouter({
	history: createWebHistory(),
	routes,
	linkActiveClass: "active",
  	linkExactActiveClass: "exact-active",
});

router.beforeEach( (to,from, next) => {
	if(to.meta.auth != true)
	{
		window.location.href = '/register';
	}else{
		next();
	}
});


import Home from './components/home.vue';
import Dashboard from './components/user/home.vue';
const app = createApp({});
app.component('home', Home);
app.component('Dashboard', Dashboard);
app.use(router);
// app.use(VueToast);
app.use(store);
app.use(Toaster);
app.mount('#root');