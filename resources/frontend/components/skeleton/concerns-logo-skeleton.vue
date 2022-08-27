<template>
	<section class="py-16 overflow-hidden">
		<div class="container">
			<div class="flex flex-col items-center">
				<div class="content w-full mb-6">
					<h2 class="heading skeleton_bg h-10 mb-4 w-40 mx-auto"></h2>
					<div class="description">
						<div class="skeleton_bg h-6 mb-4 w-full"></div>
						<div class="skeleton_bg h-6 mb-4 w-8/12"></div>
						<div class="skeleton_bg h-6 mb-4 w-10/12"></div>
						<div class="skeleton_bg h-6 mb-4 w-7/12"></div>
						<div class="skeleton_bg h-6 mb-4 w-full"></div>
					</div>
				</div>
				<div class="logo-slider w-full">
					<div
						class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4">
						<div
							class="flex justify-around items-center rounded transition-all concern"
							v-for="logo in 30"
							:key="logo">
							<div class="w-32 h-16 skeleton_bg"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_concerns-logo';
</style>

<script>
	export default {};
</script>
