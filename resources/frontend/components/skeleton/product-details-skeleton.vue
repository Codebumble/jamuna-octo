<template>
	<section class="businessDetails pb-28 pt-32">
		<div class="container">
			<div class="flex flex-col lg:flex-row gap-8">
				<div
					class="
						w-full
						lg:w-8/12
						rounded-md
						shadow-lg
						border border-slate-100
						p-8
						overflow-hidden
						businessDetails
					">
					<div class="company-gallery pt-8">
						<div
							class="
								grid grid-cols-1
								lg:grid-cols-4
								2xl:gap-3
								md:grid-cols-2
								gap-5
								pb-8
							">
							<div class="image">
								<div class="thumbnail">
									<div></div>
								</div>
							</div>
							<div class="image">
								<div class="thumbnail">
									<div></div>
								</div>
							</div>
							<div class="image">
								<div class="thumbnail">
									<div></div>
								</div>
							</div>
							<div class="image">
								<div class="thumbnail">
									<div></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss" scoped>
@import '../../assets/scss/variables/_business-details';
@import '../../assets/scss/variables/company-gallery';
.thumbnail {
	@apply h-48 lg:h-40 xl:h-48 xl:w-44 2xl:h-44 2xl:w-[13.5rem] lg:w-32 md:w-80 md:mx-auto;
	div {
		@apply h-full w-full object-cover rounded transition-all duration-500 bg-gray-100;
	}
}
</style>

<script>
export default {};
</script>
