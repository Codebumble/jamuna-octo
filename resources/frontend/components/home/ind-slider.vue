<template>
	<section class="py-16 overflow-hidden" id="ind-slider">
		<div class="flex">
			<div class="slider w-4/5 mr-2">
				<div class="company-slider">
					<Splide
						:options="options"
						aria-label="concerns logo slider">
						<SplideSlide
							v-for="img in slider"
							:key="img.src"
							class="
								flex
								justify-around
								items-center
								transition-all
								overflow-hidden
								p-4
							">
							<div class="w-full">
								<img
									class="w-full h-full"
									:src="img.src"
									:alt="img.author" />
							</div>
						</SplideSlide>
					</Splide>
				</div>
			</div>
			<div class="company">
				<div
					class="item"
					v-for="(company, index) in sliderAPIList"
					@click="getSliderImages(company.api)"
					:key="index">
					<img :src="company.thumb" :alt="company.name" />
					<h3>{{ company.name }}</h3>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
@import '@splidejs/vue-splide/css/core';
@import '../../assets/scss/variables/ind-slider';
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
			slider: [],
			sliderAPIList: [
				{
					api: 'https://picsum.photos/v2/list?page=1&limit=10',
					name: 'company 1',
					thumb: '/frontend/images/contents/denims3.jpg',
				},
				{
					api: 'https://picsum.photos/v2/list?page=2&limit=10',
					name: 'company 2',
					thumb: '/frontend/images/contents/denims3.jpg',
				},
				{
					api: 'https://picsum.photos/v2/list?page=3&limit=10',
					name: 'company 3',
					thumb: '/frontend/images/contents/denims3.jpg',
				},
				{
					api: 'https://picsum.photos/v2/list?page=4&limit=10',
					name: 'company 4',
					thumb: '/frontend/images/contents/denims3.jpg',
				},
			],
		};
	},
	methods: {
		getSliderImages(api) {
			axios.get(api).then((response) => {
				this.slider = [];
				response.data.forEach((item) => {
					this.slider.push({
						src: item.download_url,
						text: item.author,
					});
				});
			});
		},
	},
	mounted() {
		this.getSliderImages(this.sliderAPIList[0].api);
	},

	setup() {
		const options = {
			rewind: false,
			autoPlay: true,
			perPage: 1,
			pagination: false,
			arrows: true,
			type: 'loop',
			breakpoints: {
				1024: {
					perPage: 1,
				},
				480: {
					perPage: 1,
				},
			},
		};

		return { options };
	},
};
</script>
