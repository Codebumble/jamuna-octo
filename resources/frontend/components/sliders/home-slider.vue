<template>
	<section
		id="cb-bg-video"
		class="overflow-hidden cb-hero relative">
		<div class="">
			<swiper
				:modules="modules"
				:slides-per-view="1"
				:grab-cursor="true"
				:loop="true"
				:autoplay="{
					disableOnInteraction: false,
					pauseOnMouseEnter: true,
				}"
				:hash-navigation="true"
				:pagination="{ clickable: true }"
				class="">
				<swiper-slide
					v-for="slide in sliderContents"
					class="flex justify-start items-center">
					<div :class="slide.overlay ? 'image' : 'w-full'">
						<img
							:src="slide.src"
							:alt="slide.alt"
							class="w-full object-cover h-77vh" />
					</div>
					<div class="absolute w-full z-20">
						<div class="container flex flex-col">
							<div class="overflow-hidden">
								<h1
									class="text-3xl lg:text-[40px] text-white font-bold capitalize leading-snug w-[55%] lg:w-full">
									{{ slide.heading }}
								</h1>
								<p
									v-if="slide.showDescription"
									class="text-white capitalize text-lg mt-2">
									{{ slide.description }}
								</p>
							</div>
							<a
								v-if="slide.showButton"
								:href="slide.link"
								:class="{
									button: slide.button,
									'button-alt': slide.buttonAlt,
								}"
								class="mt-4 capitalize font-bold">
								{{ slide.buttonText }}
							</a>
						</div>
					</div>
				</swiper-slide>
			</swiper>
		</div>
	</section>
</template>

<style lang="scss">
	@import 'swiper/scss';
	@import 'swiper/scss/pagination';
	@import 'swiper/scss/autoplay';
	@import '../../assets/scss/variables/_hero.scss';

	.swiper-pagination-bullet {
		background: #fff;
		border: 0;
		border-radius: 50%;
		display: inline-block;
		height: 6px;
		margin: 5px;
		opacity: 1;
		padding: 0;
		position: relative;
		// /transition: transform 0.2s linear;
		width: 6px;
	}

	.swiper-pagination-bullet.swiper-pagination-bullet-active {
		//transform: scale(1.4);
		z-index: 20;
		width: 12px;
		height: 6px;
		border-radius: 50px;
		@apply bg-rose-600 #{!important};
	}

	// .splide__pagination li {
	// 	@apply flex items-center #{!important};
	// }
</style>

<script>
	// import { Splide, SplideSlide } from '@splidejs/vue-splide';
	import { Swiper, SwiperSlide } from 'swiper/vue';
	import { Pagination, Autoplay } from 'swiper';
	export default {
		data() {
			return {
				sliderContents: [],
			};
		},
		components: {
			Swiper,
			SwiperSlide,
		},
		mounted() {
			axios
				.get(window.location.origin + '/frontpage-api/slider')
				.then((response) => {
					this.sliderContents = response.data;
				});
		},
		setup() {
			return {
				modules: [Pagination, Autoplay],
			};
		},
	};
</script>
