<template>
	<div class="main">
		<div id="submain">
			<nav>
				<ul class="nav align-items-center d-flex justify-content-between">
					<li class="nav-item"><a href=""><img src="/school/icon.jpg" class="img-fluid " alt="school logo"></a></li>
					<ul class="nav">
						<li class="nav-item"><router-link to="/" active-class="active" exact class="nav-link text-light">Home</router-link></li>
						<li class="nav-item"><router-link to="/program" active-class="active" class="nav-link text-light">Program</router-link></li>
						<li class="nav-item"><router-link to="/requirements" active-class="active" class="nav-link text-light">Requirements</router-link></li>
						<li class="nav-item"><router-link to="/about" active-class="active" class="nav-link text-light">About Us</router-link></li>
						<li class="nav-item"><router-link to="/contact" active-class="active" class="nav-link text-light me-1">Contact Us</router-link></li>
						<li class="nav-item"><a href="/register" class="me-2 btn bg-warning enrollbtn">Enroll Now</a></li>
					</ul>
				</ul>
			</nav>
			<section class="d-flex p-3">
				<router-view></router-view>
			</section>
		</div>
	</div>
</template>

<script>
	export default{
		computed: {
		  user() {
		    return this.$store.state.user;
		  },
		},
	}
</script>



<style scoped>
	nav{
		height: 60px;
		width: 100%;
		background: #1b5e20;
		position: fixed;
		z-index: 2;
	}
	.main{
		width: 100%;
		height: 100vh;
	}
	#submain{
/*		background: linear-gradient(rgba(0, 0, 0, 0.2),rgba(0,0,0,0.2)), url('/school/1.jpg');
		background-size: 100% 100%;
		background-repeat: no-repeat;*/
		width: 100%;
		height: 100vh;
	}
	.img-fluid{
		width: 100px;
		height: 60px;
		padding: 10px;
	}
	.welcome{
		width: 60%;
		text-align: center;
	}
	.enrollbtn{
		background: #ffeb3b;
		color: black;
	}
	section{
		width: 100%;
		top: 60px;
		height: calc(100vh - 60px);
		justify-content: center;
		position: absolute;
		z-index: 1;
	}
	.active{
		border-bottom: 1px solid cyan;
		/*border-bottom-color: red;*/
		font-weight: 600;
	}
</style>