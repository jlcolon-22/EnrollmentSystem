<template>
	<div class="p-5 d-flex justify-content-center">
		<!-- <keep-alive> -->
		<form class="d-flex justify-content-center" enctype="multipart/form-data" v-on:submit.prevent="enroll">
		<div class="shadow d-flex" >
			<div class="first p-3">
				<h5>Student Information</h5>
				<div class="form-group mb-2">
					<input type="text" :class="[ errors.firstname ? 'is-invalid' : '' ]" class="form-control" v-model="data.firstname" placeholder="FIRSTNAME">
					<span class="text-danger" v-if="errors.firstname">{{ errors.firstname[0] }}</span>
				</div>
				<div class="form-group mb-2">
					<input type="text" class="form-control"  v-model="data.middlename" placeholder="MIDDLE NAME">
				</div>
				<div class="form-group mb-2">
					<input type="text" class="form-control" :class="[ errors.lastname ? 'is-invalid' : '' ]" v-model="data.lastname" placeholder="LASTNAME">
					<span class="text-danger" v-if="errors.lastname">{{ errors.lastname[0] }}</span>
				</div>
				<div class="form-group mb-2">
					<input type="text" class="form-control" :class="[ errors.placeOfBirth ? 'is-invalid' : '' ]" v-model="data.placeOfBirth" placeholder="PLACE OF BIRTH">
					<span class="text-danger" v-if="errors.placeOfBirth">{{ errors.placeOfBirth[0] }}</span>
				</div>
				<div class="form-group mb-2">
					<input type="text" class="form-control" :class="[ errors.dateOfBirth ? 'is-invalid' : '' ]" v-model="data.dateOfBirth" placeholder="DATE OF BIRTH">
					<span class="text-danger" v-if="errors.dateOfBirth">{{ errors.dateOfBirth[0] }}</span>
				</div>
				<div class="form-group mb-2">
					<input type="text" class="form-control" :class="[ errors.permanentAddress ? 'is-invalid' : '' ]" v-model="data.permanentAddress" placeholder="PERMANENT ADDRESS">
					<span class="text-danger" v-if="errors.permanentAddress">{{ errors.permanentAddress[0] }}</span>
				</div>
				<div class="form-group mb-2">
					<input type="text" class="form-control" :class="[ errors.cellphoneNumber ? 'is-invalid' : '' ]" v-model="data.cellphoneNumber" placeholder="CELLPHONE NUMBER">
					<span class="text-danger" v-if="errors.cellphoneNumber">{{ errors.cellphoneNumber[0] }}</span>
				</div>

				<div class="form-group mb-2">
					<select :class="[ errors.course ? 'is-invalid' : '' ]" v-model="data.course" class="form-select">
						<option value="">Select course</option>
						<option value="BSIT">BSIT</option>
						<option value="BSCS">BSCS</option>
						
					</select>
					<span class="text-danger" v-if="errors.course">{{ errors.course[0] }}</span>

<!-- 
					<input type="text" class="form-control" :class="[ errors.course ? 'is-invalid' : '' ]" v-model="data.course" placeholder="CELLPHONE NUMBER"> -->
					
				</div>

				<h5>Contact Information</h5>
				<div class="form-group mb-2">
					<input type="text" class="form-control" :class="[ errors.nameOfFather ? 'is-invalid' : '' ]" v-model="data.nameOfFather" placeholder="NAME OF FATHER">
					<span class="text-danger" v-if="errors.nameOfFather">{{ errors.nameOfFather[0] }}</span>
				</div>
				<div class="form-group mb-2">
					<input type="text" class="form-control" :class="[ errors.fatherCellphoneNumber ? 'is-invalid' : '' ]" v-model="data.fatherCellphoneNumber" placeholder="CELLPHONE NUMBER">
					<span class="text-danger" v-if="errors.fatherCellphoneNumber">{{ errors.fatherCellphoneNumber[0] }}</span>
				</div>
				<div class="form-group mb-2">
					<input type="text" class="form-control" :class="[ errors.nameOfMother ? 'is-invalid' : '' ]" v-model="data.nameOfMother" placeholder="NAME OF MOTHER">
					<span class="text-danger" v-if="errors.nameOfMother">{{ errors.nameOfMother[0] }}</span>
				</div>
				<div class="form-group mb-2">
					<input type="text" class="form-control" :class="[ errors.motherCellphoneNumber ? 'is-invalid' : '' ]" v-model="data.motherCellphoneNumber" placeholder="CELLPHONE NUMBER">
					<span class="text-danger" v-if="errors.motherCellphoneNumber">{{ errors.motherCellphoneNumber[0] }}</span>
				</div>
			</div>

			<div class="second p-3">
				<h5>Requirements</h5>
				<div class="form-group mb-2">
					<small>Photocopy of PSA</small>
					<input type="file" class="form-control form-control-sm" ref="dsad" :class="[ errors.psa ? 'is-invalid' : '' ]"   v-on:change="psa" >
					<span class="text-danger" v-if="errors.psa">{{ errors.psa[0] }}</span>
				</div>
				<div class="form-group mb-2">
					<small>Photocopy of Good Moral</small>
					<input type="file" class="form-control form-control-sm" :class="[ errors.goodMoral ? 'is-invalid' : '' ]" v-on:change="goodMoral"  >
					<span class="text-danger" v-if="errors.goodMoral">{{ errors.goodMoral[0] }}</span>
				</div>
				<div class="form-group mb-2">
					<small>Photocopy of F137</small>
					<input type="file" class="form-control form-control-sm" :class="[ errors.form137 ? 'is-invalid' : '' ]" v-on:change="form137" >
					<span class="text-danger" v-if="errors.form137">{{ errors.form137[0] }}</span>
				</div>
				<div class="form-group mb-2">
					<small>Photocopy of F138</small>
					<input type="file" class="form-control form-control-sm" :class="[ errors.form138 ? 'is-invalid' : '' ]" v-on:change="form138" >
					<span class="text-danger" v-if="errors.form138">{{ errors.form138[0] }}</span>
				</div>
			</div>

			<button class="btn btn-success" :class="[ userRequest == '' ? '' :  'disabled']" type="submit">Submit</button>
		</div>
		</form>
		<!-- </keep-alive> -->
	</div>
</template>
<style scoped>
	.shadow{
		width: 80%;
		position: relative;
	}
	form{
		width: 100%;
	}
	.first{
		width: 50%;
		border-right: 2px solid black;
	}
	.second{
		width: 50%;
	}
	button{
		position: absolute;
		bottom: 10px;
		right: 10px;
		width: 140px;
	}
</style>
<script>
	export default{
		props: {
		  user: Object
		},
		data() {
		  return {
		    data:{
		    	firstname: '',
		    	middlename: '',
		    	lastname:'',
		    	placeOfBirth:'',
		    	dateOfBirth:'',
		    	permanentAddress:'',
		    	cellphoneNumber:'',
		    	course:'',
		    	nameOfFather:'',
		    	fatherCellphoneNumber:'',
		    	nameOfMother:'',
		    	motherCellphoneNumber:'',
		    	psa: '',
		    	goodMoral:'',
		    	form137:'',
		    	form138:''
		    },
		    errors:{}
		  };
		},
		mounted(){
			this.$store.dispatch('userRequest');
		},
		computed: {
		  userRequest() {
		    return this.$store.state.userRequests;
		  },
		},
		methods: {
		  async enroll() {
		    let data = new FormData();
		    data.append('firstname',this.data.firstname);
		    data.append('middlename',this.data.middlename);
		    data.append('lastname',this.data.lastname);
		    data.append('placeOfBirth',this.data.placeOfBirth);
		    data.append('dateOfBirth',this.data.dateOfBirth);
		    data.append('permanentAddress',this.data.permanentAddress);
		    data.append('cellphoneNumber',this.data.cellphoneNumber);
		    data.append('course',this.data.course);
		    data.append('nameOfFather',this.data.nameOfFather);
		    data.append('fatherCellphoneNumber',this.data.fatherCellphoneNumber);
		    data.append('nameOfMother',this.data.nameOfMother);
		    data.append('motherCellphoneNumber',this.data.motherCellphoneNumber);
		    data.append('psa',this.data.psa);
		    data.append('goodMoral',this.data.goodMoral);
		    data.append('form137',this.data.form137);
		    data.append('form138',this.data.form138);
		    const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
		    await axios.post('/api/enroll',data,config).then(res=>{
		    	this.$toast.success('success', {
  					 		position: 'top-right'
						});

		 		setTimeout(function()
		 		{
		 			location.reload(true);
		 		},2000);
		  
		    }).catch(err =>{
		    	this.errors = err.response.data.errors;
		    });
		  },
		  psa(e){
		  	this.data.psa = e.target.files[0];

		  },
		  goodMoral(e)
		  {
		  	this.data.goodMoral = e.target.files[0];
		  }
		  ,
		  form137(e)
		  {
		  	this.data.form137 = e.target.files[0];
		  }
		  ,
		  form138(e)
		  {
		  	this.data.form138 = e.target.files[0];
		  },

		},
		created()
		{
			window.document.title = 'Dashboard';
		}
	}
</script>