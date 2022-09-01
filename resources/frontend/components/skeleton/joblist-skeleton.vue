<template>
	<section class="contact pb-28 pt-32">
		<div class="container pb-8">
			<div class="py-8">
				<h2 class="lg:w-4/6 mx-auto w-102 skeleton_bg h-8"></h2>
				<div class="cards">
					<div
						class="card"
						v-for="key in 4"
						:key="key">
						<div class="icon w-10 h-10 skeleton_bg"></div>
						<div>
							<h4 class="font-bold text-xl text-gray-800 py-2 w-44"></h4>
							<p class="text-base text-gray-500 skeleton_bg w-30 h-5 mx-auto"></p>
						</div>
					</div>
				</div>
				<div class="jobList">
					<h2 class="w-full lg:w-4/6 mx-auto skeleton_bg h-8"></h2>
					<div class="cards">
						<div
							class="card flex-col !items-start !px-4"
							v-for="circular in 4"
							:key="circular">
							<div class="flex gap-3 items-center">
								<div class="w-16">
									<div class="w-full h-10 skeleton_bg"></div>
								</div>
								<div>
									<h4 class="font-bold skeleton_bg w-30 h-5 mb-2"></h4>
									<p class="text-sm skelton_bg w-30 h-5"></p>
								</div>
							</div>
							<div>
								<h2 class="font-bold pb-1 skeleton_bg h-6 w-60 mb-2"></h2>
								<p class="text-sm capitalize skelton_bg w-10 h-5"></p>
							</div>
							<div class="exerp">
								<div class="skeleton_bg h-6 mb-4 w-full"></div>
								<div class="skeleton_bg h-6 mb-4 w-8/12"></div>
							</div>
							<div
								class="flex justify-between w-full flex-col xl:flex-row">
								<div>
									<span class="skelton_bg w-30 h-8"></span>
								</div>
								<div class="my-4 xl:my-0 skeleton_bg w-[110px] h-[35px]"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_career';
</style>

<script>
	export default {};
</script>
