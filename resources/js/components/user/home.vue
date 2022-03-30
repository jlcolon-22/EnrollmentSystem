<template>
	<div>
		<nav>
			<ul class="nav">
				<li class="nav-item"><a href="#" v-on:click="toggle" :class="[ menuBurger ? 'burger' : '']"  class="nav-link text-light"><i class="fa-solid fa-bars"></i></a></li>

			</ul>
		</nav>
		<div>
			<router-view :user="[ user != '' ? user : '']"></router-view>
		</div>
		<aside v-if="menuBurger">
			<div class="p-2 d-flex flex-column align-items-center">
				<img src="/school/1.jpg" class="rounded-circle">
				<small>Name: {{ user.firstname }}</small>
				<small>Email: {{ user.email }}</small>
				<small>Email: {{ user.contact }}</small>
			</div>
			<ul class="nav ">
				<li class="nav-item w-100"><router-link class="nav-link rl text-dark" active-class="active" to="/user/dashboard">Dashboard</router-link></li>
				<li class="nav-item w-100"><router-link class="nav-link rl text-dark" active-class="active" to="/user/status">Status</router-link> </li>
				<li class="nav-item w-100"><a href="#" @click="logout" class="nav-link rl text-dark" active-class="active" to="/user/dashboard">logout</a> </li>
			</ul>
		</aside>
	</div>
</template>
<style scoped>
	nav{
		background: #1b5e20;
	}
	.rl{
		background: #0003;
		color: white;
	}
	.active{
		border-left: 3px solid cyan;
		background: #4caf50;
	}
	.burger{
		margin-left: 250px;
		z-index: 2;
	}
	img{
		width: 150px;
		height: 120px;
	}
	aside{
		width: 260px;
		height: 100vh;
		background: #2e7d32;
		position: absolute;
		top: 0;
		z-index: 1;
	}
</style>
<script>
	export default{
		props: {
		  user: Object
		},
		data() {
		  return {
		    menuBurger: false
		  };
		},
		methods: {
		  toggle() {
		    this.menuBurger = !this.menuBurger;
		  },
		  logout(){
		  	axios.get('/api/logout').then(res =>{
		  		if(res.status == 200)
		  		{
		  			window.location.href = '/';
		  			localStorage.removeItem('dstk');

		  		}
		  	})
		  }
		},
		created()
		{
			axios.defaults.headers.common['Authentication'] = 'Bearer ' + localStorage.getItem('dstk');
		}
	}
</script>