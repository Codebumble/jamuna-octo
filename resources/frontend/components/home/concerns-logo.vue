<template>
	<section class="py-16 overflow-hidden">
		<div class="container">
			<div class="flex flex-col items-center">
				<div class="content w-full mb-6">
					<h2 class="heading">{{ aboutConcerns.heading }}</h2>
				</div>
				<div class="logo-slider w-full">
					<Splide
						:options="options"
						aria-label="concerns logo slider">
						<SplideSlide
							v-for="logo in concernlogo"
							:key="logo"
							class="flex justify-around items-center transition-all overflow-hidden p-4">
							<div class="concern rounded-full">
								<img
									:src="'/company-images/' + logo.image"
									:alt="logo.name" />
							</div>
						</SplideSlide>
					</Splide>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_concerns-logo';
</style>

<script>
	export default {
		components: {},
		data() {
			return {
				aboutConcerns: {},

				concernlogo: [],
			};
		},
		mounted() {
			axios
				.get(window.location.origin + '/frontpage-api/concern-details')
				.then((response) => {
					this.aboutConcerns = response.data;
				});
			axios
				.get(
					window.location.origin + '/frontpage-api/company-name-logo'
				)
				.then((response) => {
					this.concernlogo = response.data;
				});
		},

		setup() {
			const options = {
				autoplay: true,
				perPage: 5,
				perMove: 1,
				arrows: true,
				type: 'loop',
				interval: 3000,
				pagination: false,
				breakpoints: {
					1024: {
						perPage: 4,
					},
					480: {
						perPage: 2,
					},
				},
			};

			return { options };
		},
	};
</script>
