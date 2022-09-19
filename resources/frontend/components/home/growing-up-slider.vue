<template>
	<section class="py-16 overflow-hidden">
		<div class="flex flex-col items-center">
			<div class="content w-full mb-6">
				<h2 class="heading uppercase">48 years of growing up</h2>
			</div>
			<div class="growing-slider w-full">
				<Splide :options="options" aria-label="concerns logo slider">
					<SplideSlide
						v-for="item in growingUpSlider"
						:key="item.largeImageURL"
						class="
							flex
							justify-around
							items-center
							transition-all
							overflow-hidden
							p-4
						">
						<div class="growing-up-slider">
							<img :src="item.largeImageURL" :alt="item.user" />
						</div>
					</SplideSlide>
				</Splide>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
@import '@splidejs/vue-splide/css/core';
.growing-up-slider {
	@apply w-full h-112;
	img {
		@apply w-full h-full;
	}
}
</style>

<script>
import { Splide, SplideSlide } from '@splidejs/vue-splide';
export default {
	components: {
		Splide,
		SplideSlide,
	},
	data() {
		return {
			growingUpSlider: [],
		};
	},
	mounted() {
		axios.get('../../faker/images.json').then((response) => {
			console.log(response.data.hits);
			this.growingUpSlider = response.data.hits;
		});
	},

	setup() {
		const options = {
			rewind: false,
			autoPlay: true,
			perPage: 1,
			pagination: false,
			arrows: true,
			type: 'loop',
			// breakpoints: {
			// 	1024: {
			// 		perPage: 4,
			// 	},
			// 	480: {
			// 		perPage: 2,
			// 	},
			// },
		};

		return { options };
	},
};
</script>
