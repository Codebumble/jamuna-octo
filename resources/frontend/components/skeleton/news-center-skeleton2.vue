<template>
	<section class="news-center pb-28 pt-32">
		<div class="container pb-8">
			<div
				class="flex gap-4 justify-center items-center flex-col xl:flex-row">
				<div class="yt basis-4/2">
					<div class="rounded-md xl:w-[37rem] h-56 xl:h-80 w-80 skeleton_bg"></div>
				</div>
				<div
					class="md:w-8/12 xl:border-l-2 border-gray-400 min-h-[250px] basis-4/2 py-4 px-8 xl:ml-4">
					<h2 class="text-xl font-bold mb-4 w-full h-8 skeleton_bg"></h2>
					<div
						class="flex flex-col sm:flex-row xl:flex-col justify-between">
						<div class="mb-4">
							<h4 class="w-15 h-6 skeleton_bg"></h4>
							<span class="block w-40 h-5 skeleton_bg"></span>
							<span class="block w-40 h-5 skeleton_bg"></span>
						</div>
						<div class="">
							<h4 class="w-15 h-6 skeleton_bg"></h4>
							<span class="block w-40 h-5 skeleton_bg"></span>
							<span class="block w-40 h-5 skeleton_bg"></span>
						</div>
					</div>
				</div>
			</div>
			<!-- district correspondent -->
			<div class="heading">
				<h2 class="skeleton_bg w-80 h-8 mb-4 mx-auto"></h2>
				<p class="skeleton_bg lg:w-100 h-6"></p>
			</div>
			<div
				class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 py-8">
				<div
					class="member"
					v-for="index in 4"
					:key="index">
					<div class="thumb">
						<div class="image max-h-[288px] min-h-[288px] w-[280px] skeleton_bg" ></div>
					</div>
					<div class="info">
						<h3 class="skeleton_bg w-26 h-8 mb-4"></h3>
						<p class="skeleton_bg w-26 h-6 mb-4"></p>
						<p class="skeleton_bg w-26 h-6"></p>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_news-center';
</style>

<script>
	export default {};
</script>
