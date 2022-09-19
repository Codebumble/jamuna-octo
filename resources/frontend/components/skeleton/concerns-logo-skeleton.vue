<template>
	<section class="py-16 overflow-hidden">
		<div class="container">
			<div class="flex flex-col items-center">
				<div class="content w-full mb-6">
					<h2 class="heading skeleton_bg h-10 mb-4 w-40 mx-auto"></h2>
				</div>
				<div class="logo-slider w-full">
					<div
						class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4">
						<div
							class="flex justify-around items-center rounded transition-all concern"
							v-for="logo in 5"
							:key="logo">
							<div class="concern rounded-full">
								<div class="skeleton_bg mix-blend-luminosity p-4 md:p-0"></div>
							</div>
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
