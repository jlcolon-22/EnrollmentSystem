

// import HomePage from '../components/pages/homepage.vue';
// // import Program from '../components/pages/program.vue';
// import Requirements from '../components/pages/requirements.vue';
// import About from '../components/pages/about.vue';
// import Contact from '../components/pages/contact.vue';
// import Login from '../components/auth/login.vue';
// import Register from '../components/auth/register.vue';

const routes = [
	{
		path: '/',
		component: () => import('../components/pages/homepage.vue'),
		meta: { auth:true}
	},
	{
		path: '/program',
		component:  () => import('../components/pages/program.vue'),
		meta: { auth:true}

	},
	{
		path: '/requirements',
		component: () => import('../components/pages/requirements.vue'),
		meta: { auth:true}
	},
	{
		path: '/about',
		component:  () => import('../components/pages/about.vue'),
		meta: { auth:true}
	},
	{
		path: '/contact',
		component:  () => import('../components/pages/contact.vue'),
		meta: { auth:true}
	},
	{
		path: '/login',
		component:  () => import('../components/auth/login.vue'),
		meta: { auth:true}
	},
	{
		path: '/register',
		component: () => import('../components/auth/register.vue'),
		meta: { auth:true},
		
	}
	,
	{
		path: '/user/dashboard',
		component: () => import('../components/user/dashboard.vue'),
		name: 'dashboard',
		meta: { auth: localStorage.getItem('dstk') ? true : false }
	},
	{
		path: '/user/status',
		component: () => import('../components/user/status.vue'),
		name: 'status',
		meta: { auth: localStorage.getItem('dstk') ? true : false }
	},
	{
		path: '/user/home',
		component: () => import('../components/user/home.vue'),
		name: 'home',
		meta: { auth: localStorage.getItem('dstk') ? true : false }
	}

];


export default routes