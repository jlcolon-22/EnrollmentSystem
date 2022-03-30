<template>
	<div class="container p-5">
		<table class="table table-bordered text-center">
			<thead>
				<td>#</td>
				<th>Name</th>
				<th>Course</th>
				<th>Status</th>
				<th>Date</th>
				<th>Action</th>
			</thead>
			<tbody v-if="userRequest != ''">
				<td>{{ userRequest.id }}</td>
				<td>{{ userRequest.firstname }} {{ userRequest.lastname }}</td>
				<td>{{ userRequest.course }}</td>
				<td>
					<small class="pending rounded" v-if="!userRequest.status">Pending</small>
					<small class="pending rounded bg-success" v-if="userRequest.status">Approved</small>
				</td>
				<td>{{ userRequest.created_at }}</td>
				<td><button class="btn text-danger" @click="del"><i class="fa-solid fa-trash-can"></i></button></td>
			</tbody>
		</table>
	</div>
</template>

<style scoped>
	.pending{
		background: #ffb300;
		padding: 2px;

	}
</style>

<script>
	export default{
		computed: {
		  userRequest() {
		    return this.$store.state.userRequests;
		  },
		},
		mounted(){
			this.$store.dispatch('userRequest');
		},
		created()
		{
			window.document.title = 'Status';
		},
		methods: {
		  del() {
		   	axios.get('/api/del').then(res =>{
		   		this.$toast.error('success', {
  					 		position: 'top-right'
						});
		   		this.$store.dispatch('userRequest');
		   	})
		  },
		},
	}
</script>