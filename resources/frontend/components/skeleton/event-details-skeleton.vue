<template>
	<section class="py-28">
		<div class="container">
			<div class="upper-part">
				<div class="w-full lg:w-8/12 mx-auto">
					<div>
						<div class="rounded-md w-full h-44 lg:h-96 object-cover skeleton_bg"></div>
					</div>
				</div>
				<div class="pt-8 text-center mb-8">
					<h2 class="font-bold text-gray-800 text-3xl leading-snug pb-1 skeleton_bg h-10 w-110 mx-auto mb-4"></h2>
					<p class="mb-0 skeleton_bg w-80 mx-auto"></p>
					<div class="pt-4 skeleton_bg w-60 h-8 mx-auto mb-4"></div>
					<div class="share skeleton_bg w-40 h-8 mx-auto"></div>
				</div>
			</div>
			<!-- upper part closed -->
			<div class="description">
				<div class="skeleton_bg h-6 mb-4 w-full"></div>
				<div class="skeleton_bg h-6 mb-4 w-8/12"></div>
				<div class="skeleton_bg h-6 mb-4 w-10/12"></div>
				<div class="skeleton_bg h-6 mb-4 w-7/12"></div>
				<div class="skeleton_bg h-6 mb-4 w-full"></div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/career';
	@import '../../assets/scss/variables/apply';
</style>

<script>
	export default {};
</script>
<style lang="scss">
	.share {
		@apply flex items-center text-[1.3rem] gap-3 justify-center content-center py-4;

		a {
			@apply text-gray-800 transition-all;
		}

		.share-network-facebook {
			@apply hover:text-blue-600 transition-all;
		}
		.share-network-linkedin {
			@apply hover:text-[#0077b5] transition-all;
		}
		.share-network-messenger {
			@apply hover:text-[#2f80fe] transition-all;
		}
		.share-network-twitter {
			@apply hover:text-[#1da1f2] transition-all;
		}
		.share-network-whatsapp {
			@apply hover:text-green-600 transition-all;
		}
	}
</style>
