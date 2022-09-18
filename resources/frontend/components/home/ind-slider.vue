<template>
	<section>
		<div class="container">
			<Splide
				:options="options"
				aria-label="industrial slider">
				<SplideSlide
					v-for="slide in slides"
					:key="slide">
					<img
						:src="slide.src"
						:alt="slide.caption" />
				</SplideSlide>
			</Splide>
		</div>
	</section>
</template>

<style lang="scss">
	@import '@splidejs/vue-splide/css/core';
</style>

<script>
	import { Splide, SplideSlide } from '@splidejs/vue-splide';
	import axios from 'axios';
	export default {
		data() {
			return {
				slides: [
					{
						src: '',
						caption: '',
					},
				],
			};
		},
		components: {
			Splide,
			SplideSlide,
		},
		mounted() {
			axios.get('https://picsum.photos/v2/list').then((response) => {
				this.slides.src = response.data.download_url;
				this.slides.caption = response.data.author;

				console.log(this.slides.src);
			});
		},
		setup() {
			const options = {
				rewind: false,
				autoPlay: true,
				perPage: 5,
				pagination: false,
				arrows: true,
				type: 'loop',
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
