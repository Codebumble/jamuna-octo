<template>
	<section class="py-16 overflow-hidden bg-slate-50">
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
			Splide,
			SplideSlide,
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
