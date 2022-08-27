<template>
	<section class="founder pb-28 pt-32">
		<div class="quote">
			<div class="container">
				<div
					class="flex flex-col xl:flex-row justify-center items-center py-4">
					<div class="xl:basis-2/4">
						<div
							class="w-7/12 h-98 mx-auto rounded skeleton_bg"></div>
					</div>
					<div class="xl:basis-2/4 mt-8 xl:mt-0">
						<blockquote
							class="xl:w-3/4">
							<div class="skeleton_bg h-6 mb-4 w-full"></div>
						<div class="skeleton_bg h-6 mb-4 w-8/12"></div>
						<div class="skeleton_bg h-6 mb-4 w-10/12"></div>
						</blockquote>
						<cite class="block text-lg pt-2">
							<div class="skeleton_bg h-6 mb-4 w-full"></div>
						</cite>
						<span clsas="py-2"><div class="skeleton_bg h-6 mb-4 w-full"></div></span>
					</div>
				</div>
			</div>
		</div>

		<div class="py-16 lg:py-28">
			<div class="container">
				<div class="about-founder">
					<h2 class=" skeleton_bg h-6 mb-4 w-80"></h2>
					<div>
						<div class="skeleton_bg h-6 mb-4 w-full"></div>
						<div class="skeleton_bg h-6 mb-4 w-8/12"></div>
						<div class="skeleton_bg h-6 mb-4 w-10/12"></div>
						<div class="skeleton_bg h-6 mb-4 w-7/12"></div>
						<div class="skeleton_bg h-6 mb-4 w-full"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	.about-founder {
		@apply text-center py-4 overflow-hidden;

		h2 {
			@apply text-4xl text-gray-800 font-bold pb-6;
		}

		p {
			@apply xl:w-10/12 mx-auto text-gray-400;
		}
	}

	.quote {
		@apply pb-8 pt-12;
	}
</style>

<script>
	export default {};
</script>
