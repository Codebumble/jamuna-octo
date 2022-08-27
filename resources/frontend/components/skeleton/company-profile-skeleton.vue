<template>
	<section class="company-profile pb-28 pt-32">
		<div class="container">
			<div class="description">
				<div v-for="index in 15" :key="index">
					<div class="skeleton_bg h-6 mb-4 w-full"></div>
				</div>
			</div>
			<div class="content-box" v-for="index in 4" :key="index">
				<h2 class="skeleton_bg h-10 mb-4 w-40"></h2>
				<h4 class="subtitle h-8 skeleton_bg"></h4>
				<div class="skeleton_bg h-6 mb-4 w-full"></div>
				<div class="skeleton_bg h-6 mb-4 w-full"></div>
				<div class="skeleton_bg h-6 mb-4 w-full"></div>
				<div class="skeleton_bg h-6 mb-4 w-full"></div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
@import '../../assets/scss/variables/company-profile';
</style>

<script>
export default {};
</script>
