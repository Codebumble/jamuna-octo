<template>
	<section class="py-16 overflow-hidden">
		<div class="container">
			<div class="flex flex-col lg:flex-row items-center lg:flex-wrap">
				<div class="content lg:basis-7/12">
					<h2 class="heading">{{ aboutConcerns.heading }}</h2>
					<p class="description">{{ aboutConcerns.description }}</p>
				</div>
				<div class="logo-slider lg:basis-5/12">
					<Splide
						:extensions="extensions"
						:options="conoptions"
						aria-label="concerns logo area">
						<SplideSlide
							v-for="(slide, key) in concernlogo"
							:key="key">
							<div
								class="flex justify-around items-center rounded-md transition-all concern">
								<img
									:src="slide.src"
									:alt="slide.alt"
									class="w-32" />
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
	import { Splide, SplideSlide } from '@splidejs/vue-splide';
	import { Grid } from '@splidejs/splide-extension-grid';
	export default {
		data() {
			return {
				aboutConcerns: {},

				concernlogo: [
					{
						src: '/frontend/images/concerns/1.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/2.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/3.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/4.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/5.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/6.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/7.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/8.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/9.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/10.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/11.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/12.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/13.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/14.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/15.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/16.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/17.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/18.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/19.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/20.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/21.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/22.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/23.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/24.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/25.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/26.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/27.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/28.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/29.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/30.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/31.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/32.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/33.png',
						alt: 'concern 1',
					},
					{
						src: '/frontend/images/concerns/34.png',
						alt: 'concern 1',
					},
				],
			};
		},

		components: {
			Splide,
			SplideSlide,
		},

		mounted() {
			axios
				.get(window.location.origin + '/frontpage-api/concern-details')
				.then((response) => {
					this.aboutConcerns = response.data;
				});
		},

		setup() {
			const conoptions = {
				rewind: true,
				rewindByDrag: true,
				arrows: true,
				autoplay: true,
				perPage: 1,
				perMove: 1,
				drag: true,
				pauseOnHover: true,
				cloneStatus: false,
				autoHeight: true,
				pagination: false,
				gap: '1rem',
				grid: {
					rows: 2,
					cols: 2,
					gap: {
						row: '1rem',
						col: '1rem',
					},
				},
			};

			return {
				conoptions,
				extensions: {
					Grid,
				},
			};
		},
	};
</script>
