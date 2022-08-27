<template>
	<section class="directors pb-28 pt-32">
		<div class="container">
			<div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8 pb-8">
				<div
					class="member"
					v-for="index in 3"
					:key="index">
					<div class="thumb">
						<div
							class="image max-h-[394px] min-h-[394px] skeleton_bg"></div>
					</div>
					<div class="info">
						<h3 class="skeleton_bg h-8 mb-4 w-40 mx-auto"></h3>
						<div class="skeleton_bg h-6 mb-4 w-full"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_directors';
</style>

<script>
	export default {};
</script>
