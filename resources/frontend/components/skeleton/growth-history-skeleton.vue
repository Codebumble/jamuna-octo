<template>
	<section class="growthHistory pb-16 pt-32">
		<div class="container relative">
			<div class="text-center pb-14">
				<h2 class="skeleton_bg h-10 mb-4 w-80 mx-auto"></h2>
			</div>
			<div class="timeline">
				<ul>
					<li
						class="item"
						v-for="key in 10"
						:class="key === 0 ? 'active' : ''"
						:key="key">
						<div class="content">
							<div class="heading">
								<h4 class="step skelton_bg h-6 w-12"></h4>
							</div>
							<div class="main-content">
								<div class="skeleton_bg h-6 mb-4 w-full"></div>
								<div class="skeleton_bg h-6 mb-4 w-8/12"></div>
								<div class="skeleton_bg h-6 mb-4 w-10/12"></div>
								<div class="skeleton_bg h-6 mb-4 w-7/12"></div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
@import '../../assets/scss/variables/_growth';
</style>

<script>
export default {};
</script>
