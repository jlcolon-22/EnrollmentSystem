<template>
	<div class="container align-items-center d-flex justify-content-center">
		<div class="shadow-lg p-2 ">
			<h1 class="text-center">Login</h1>
			<form v-on:submit.prevent="login">
				<div class="form-group mb-2">
					<input type="text" class="form-control" v-model="user.email" placeholder="Email">
				</div>
				<div class="form-group mb-2">
					<input type="password" class="form-control" v-model="user.password" placeholder="********">
				</div>
				<div class="form-group mb-2">
					<button class="btn w-100 btn-primary" v-if="!spin">Login</button>
					<button class="btn btn-primary w-100" v-if="spin" type="button" disabled>
					  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
					  Loading...
					</button>
				</div>
				
			</form>
		</div>
	</div>
</template>
<script>
	export default{
		data() {
		  return {
		    user:{
		    	email: '',
		    	password: ''
		    },
		    spin: false
		  };
		},
		methods: {
		 async login() {
		 	this.spin = true
 				await axios.get('/sanctum/csrf-cookie').then(res => {
 					axios.post('/api/login',this.user).then(res =>{
 						localStorage.setItem('dstk', res.data);
 						this.spin = false
 						window.location.href = 'user/dashboard';
 					}).catch(err =>{
 						this.spin = false
 						this.$toast.error('Wrong credencials', {
  					 		position: 'top-right'
						});
 					})
 				})

		}
		}
	}
</script>
<style scoped>
	.container{
		height: 70vh;
	}
	.shadow-lg{
		width: 400px;
	}
</style>