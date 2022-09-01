<template>
	<section class="contact pb-8 pt-32">
		<div class="container pb-8">
			<div class="text-center pb-12">
				<h2 class="skeleton_bg h-[50px] w-72 mx-auto"></h2>
			</div>
			<div class="main-content">
				<span class="date skeleton_bg w-[150px] h-5 mx-auto"></span>
				<div v-for="index in 4" :key="index">
					<h2 class="w-72 h-6 skeleton_bg mb-6"></h2>
					<div class="skeleton_bg h-6 mb-4 w-full"></div>
						<div class="skeleton_bg h-6 mb-4 w-8/12"></div>
						<div class="skeleton_bg h-6 mb-4 w-10/12"></div>
						<div class="skeleton_bg h-6 mb-4 w-7/12"></div>
					<div class="skeleton_bg h-6 mb-4 w-full"></div>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	.date {
		text-align: center;
		display: block;
		margin-bottom: 2rem;
	}

	h1,
	h2,
	h3,
	h4,
	h5 {
		@apply pb-2 text-2xl font-bold;
	}

	p {
		@apply mb-4;
	}
</style>

<script>
	export default {};
</script>
