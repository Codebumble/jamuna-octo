<template>
	<section class="pb-16 pt-32">
		<div class="container">
			<div class="text-center pb-14">
				<h2 class="skeleton_bg h-10 mb-4 w-80 mx-auto"></h2>
			</div>
			<div class="grid lg:grid-cols-3 gap-4">
				<div
					class="shadow hover:shadow-md transition-all"
					v-for="( key) in 3"
					:key="key">
					<div
						class="w-full rounded-bl-none rounded-br-none rounded-tr rounded-tl min-h-[200px] max-h-[200px] object-cover pt-0 skeleton_bg" ></div>
					<div
						class="p-4 pb-6 rounded-tl-none rounded-tr-none rounded-bl rounded-br backdrop-blur-md min-h-[180px] max-h-[180px] overflow-hidden">
						<h4 class="text-left mt-4 mb-2 skeleton_bg h-6 w-80"></h4>
						<p class="pb-2">
							<div class="skeleton_bg h-6 mb-4 w-full"></div>
							<div class="skeleton_bg h-6 mb-4 w-8/12"></div>
							<div class="skeleton_bg h-6 mb-4 w-10/12"></div>
							<div class="skeleton_bg h-6 mb-4 w-7/12"></div>
							<div class="skeleton_bg h-6 mb-4 w-full"></div>
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_group-company';
</style>

<script>
	export default {};
</script>
