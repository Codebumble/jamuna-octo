<template>
	<section class="py-16 overflow-hidden bg-slate-50">
		<div class="container">
			<div class="grid grid-cols-7 lg:flex-row items-center">
				<div class="content col-span-7 xl:col-span-4">
					<h2 class="heading">{{ aboutConcerns.heading }}</h2>
					<p class="description">{{ aboutConcerns.description }}</p>
				</div>
				<div class="logo-slider col-span-7 xl:col-span-3">
					<Swiper
						:slidesPerView="2"
						:spaceBetween="10"
						:width="null"
						:loop="true"
						:autoplay="{
							disableOnInteraction: false,
							pauseOnMouseEnter: true,
						}"
						navigation
						:modules="concernmodules"
						:grid="{ rows: 2 }">
						<SwiperSlide v-for="slide in concernlogo">
							<div
								class="flex justify-around items-center rounded-md transition-all bg-[#f9f9f9] concern">
								<img
									:src="slide.src"
									:alt="slide.alt"
									class="w-32 p-3" />
							</div>
						</SwiperSlide>
					</Swiper>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_concerns-logo';
	@import 'swiper/scss';
	@import 'swiper/scss/autoplay';
	@import 'swiper/scss/navigation';

	.swiper-grid > .swiper-wrapper {
		display: grid;
		grid-template-rows: repeat(2, minmax(0, 1fr));
		grid-auto-flow: column;
	}
</style>

<script>
	import { Swiper, SwiperSlide } from 'swiper/vue';
	import { Navigation, Autoplay, Grid } from 'swiper';
	export default {
		data() {
			return {
				aboutConcerns: {
					heading: 'Lorem ipsum dolor sit amet.',
					description:
						'Lorem ipsum dolor sit amet consectetur adipisicing elit. "Facere quod pariatur voluptatem iusto iste commodi ullam dolore. "Autem, eligendi nisi. Facere quod pariatur voluptatem iusto iste commodi ullam dolore. Autem, eligendi nisi.',
				},

				concernlogo: [
					{
						src: '/frontend/images/concerns/ionic.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/nuxt.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/refurbed.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/storyblok.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/uni_app.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/vueschool.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/vuemastery.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/vehikl.png',
						alt: 'concern 1',
					},
				],
			};
		},

		components: {
			Swiper,
			SwiperSlide,
		},
		setup() {
			return {
				concernmodules: [Navigation, Autoplay, Grid],
			};
		},
	};
</script>
