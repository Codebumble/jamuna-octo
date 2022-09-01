<template>
	<div class="image-gallery pb-16 pt-32">
		<div class="container">
			<div
				class="grid grid-cols-1 lg:grid-cols-4 2xl:grid-cols-5 md:grid-cols-2 gap-5 2xl:gap-3 pb-8">
				<div
					v-for="(index) in 8"
					:key="index"
					class="image">
					<div class="thumbnail skeleton_bg"></div>
				</div>
			</div>
		</div>
	</div>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/image-gallery';
</style>

<script>
	export default {};
</script>
