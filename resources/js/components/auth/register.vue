<template>
	<div class="container align-items-center d-flex justify-content-center">
		<div class="shadow-lg p-2 ">
			<h1 class="text-center">Register</h1>
			<form v-on:submit.prevent="register">
				<div class="form-group mb-2">
					<input type="text" :class="[errors.firstname ? 'is-invalid' : '' ]" class="form-control"  v-model="user.firstname" placeholder="Fistname">
					<span class="text-danger" v-if="errors.firstname">{{ errors.firstname[0] }}</span>
				</div>
				<div class="form-group mb-2">
					<input type="text" class="form-control" v-model="user.middlename" placeholder="Middlename(optional)">
				</div>
				<div class="form-group mb-2">
					<input type="text" class="form-control" :class="[errors.lastname ? 'is-invalid' : '' ]" v-model="user.lastname" placeholder="Lastname">
					<span class="text-danger" v-if="errors.lastname">{{ errors.lastname[0] }}</span>
				</div>
				<div class="form-group mb-2">
					<select class="form-select" :class="[errors.studentType ? 'is-invalid' : '' ]" v-model="user.studentType">
					<option value="" selected>Choose a student type</option>
					<option value="1">College(New Student)</option>
					<option value="2">College(Transferee Student)</option>
					<option value="3">SHS(Grade 11)</option>
					<option value="4">SHS(Transferee Student)</option>
				</select>
				<span class="text-danger" v-if="errors.studentType">{{ errors.studentType[0] }}</span>
				</div>
				<div class="form-group mb-2">
					<input type="text" class="form-control" :class="[errors.contact ? 'is-invalid' : '' ]" placeholder="Contact" v-model="user.contact">
					<span class="text-danger" v-if="errors.contact">{{ errors.contact[0] }}</span>
				</div>
				<div class="form-group mb-2">
					<input type="text" class="form-control" :class="[errors.email ? 'is-invalid' : '' ]" placeholder="Email" v-model="user.email">
					<span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
				</div>
				<div class="form-group mb-2">
					<input type="text" class="form-control" :class="[errors.password ? 'is-invalid' : '' ]" placeholder="Password" v-model="user.password">
					<span class="text-danger" v-if="errors.password">{{ errors.password[0] }}</span>
				</div>
				<div class="form-group mb-2">
					<input type="password_confimation" :class="[errors.password_confirmation ? 'is-invalid' : '' ]" class="form-control" placeholder="Password Confirmation" v-model="user.password_confirmation">
					<span class="text-danger" v-if="errors.password_confirmation">{{ errors.password_confirmation[0] }}</span>
				</div>
				<div class="form-group mb-2">
					<button class="btn w-100 btn-primary" >Register</button>
					
				</div>
				
				<p class="text-center">Already have an account ? Click <a href="/login">here to login</a></p>
			</form>
		</div>
	</div>
</template>
<script>
	export default{
		data() {
		  return {
		    user:{
		    	firstname: '',
		    	middlename: null,
		    	lastname: '',
		    	studentType: '',
		    	email:'',
		    	contact: '',
		    	password: '',
		    	password_confirmation: '',

		    },
		    errors: [],

		  }
		},
		methods: {
		  async register() {
		    await axios.get('/sanctum/csrf-cookie').then(res => {
		    	 axios.post('/api/register',this.user).then(res => {
		    	 	
		    		if (res.status == 201) {
		    			this.$toast.success('Success', {
  					 		position: 'top-right'
						})
		    			this.user.firstname = '';
				    	this.user.middlename = null;
				    	this.user.lastname = '';
				    	this.user.studentType = '';
				    	this.user.contact = '';
				    	this.user.email = '';
				    	this.user.password = '';
				    	this.user.password_confirmation = '';
		  	    	}
		    	}).catch(error =>{
		    		this.errors = error.response.data.errors;
		    	})
		    })
		  },
		},
	}
</script>
<style scoped>
	.container{
		min-height: 100vh;
	}
	.shadow-lg{
		width: 800px;
	}
</style>