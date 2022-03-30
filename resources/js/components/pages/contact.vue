<template>
	<div class="d-flex justify-content-center">

		<form action="" class="card me-2 p-2">
			<h1 class="text-center">Contact Us</h1>
			<div class="form-group mb-2">
				<input type="text" class="form-control" placeholder="Email">
			</div>

			<div class="form-group mb-2">
				<textarea class="form-control" cols="30" rows="5" placeholder="Message"></textarea>
			</div>
			<div class="form-group mb-2 d-flex justify-content-center">
				<button class="btn btn-primary w-100" type="submit">Submit</button>
			</div>
		</form>
		<div class="card p-2">
			<p>For more inquiries about our Senior High School department, you may email us at <strong><a href="">shsregistrar@tmlcr.edu.ph</a></strong> <br>
			Inquiries for College department may be sent to this email: <strong><a href="mailto:shsregistrar@tmlcr.edu.ph">collegeregistrar@tmlcr.edu.ph</a></strong> <br>
			For general inquiries, you may message us at our official Facebook page: <strong><a href="">www.facebook.com/TMLCR2004Official</a></strong></p>
		</div>
	</div>
</template>
<script>
	export default{
		created(){
			window.document.title = 'Contact';
		}
	}
</script>
<style scoped>
	.card{
		width: 600px;
		height: 400px;
	}
	
</style>