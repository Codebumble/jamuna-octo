<template>
	<section
		id="cb-bg-video"
		class="overflow-hidden cb-hero relative">
		<div class="zigzag_bg">
			<Splide
				:options="optionx"
				aria-label="header slider">
				<SplideSlide
					v-for="(slide, item) in sliderContents"
					:key="item"
					class="flex justify-start items-center">
					<div class="image">
						<video
							class="w-full object-cover h-[90vh]"
							autoplay
							muted
							loop>
							<source
								:src="slide.src"
								type="video/mp4" />
							Your browser does not support the video tag.
						</video>
						<!-- <img
							:src="slide.src"
							alt=""
							class="w-full object-cover h-77vh" /> -->
					</div>
					<div class="absolute w-full z-20">
						<div class="container flex flex-col">
							<div class="overflow-hidden">
								<h1
									class="ml-8 2xl:ml-8 xl:ml-0 text-2xl lg:text-[36px] text-white font-bold capitalize leading-snug w-[80%] lg:w-[50%] text-shadow-extreme">
									{{ slide.heading }}
								</h1>
								<!-- <p
									v-if="slide.description"
									class="text-white capitalize text-lg mt-2">
									{{ slide.description }}
								</p> -->
							</div>
							<!-- <a
								v-if="slide.buttonText && slide.link"
								:href="slide.link"
								:class="slide.btnStyle"
								class="mt-4 capitalize font-bold">
								{{ slide.buttonText }}
							</a> -->
						</div>
					</div>
				</SplideSlide>
			</Splide>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_hero.scss';
	@import '@splidejs/vue-splide/css/core';
</style>

<script>
	import { Splide, SplideSlide } from '@splidejs/vue-splide';
	export default {
		data() {
			return {
				sliderContents: [],
			};
		},
		components: {
			Splide,
			SplideSlide,
		},
		mounted() {
			axios
				.get(window.location.origin + '/frontpage-api/video-slider')
				.then((response) => {
					this.sliderContents = response.data;
				});
		},
		setup() {
			const optionx = {
				autoplay: true,
				rewind: true,
				perPage: 1,
				perMove: 1,
				pagination: true,
				arrows: true,
				type: 'fade',
				interval: 3000,
				pagination: false,
			};
			return {
				optionx,
			};
		},
	};
</script>
