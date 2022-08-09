<template>
	<section class="group-company">
		<div class="container">
			<div class="title">
				<h2 class="text-4xl text-gray-800 font-bold">
					{{ groupTitle.title }}
				</h2>
				<p v-if="groupTitle.descVisibility">
					{{ groupTitle.description }}
				</p>
			</div>
		</div>
		<div class="company-slide">
			<Splide
				:options="options"
				aria-label="group-companies">
				<SplideSlide
					class="slideItem"
					v-for="slide in slideContent">
					<div class="p-4 pb-6 rounded-xl backdrop-blur-md">
						<img
							:src="slide.imgSrc"
							:alt="slide.alt"
							class="w-full rounded-xl" />

						<span class="itemName">{{ slide.title }}</span>
						<a
							:href="slide.webLink"
							class="button block mx-auto"
							>{{ slide.linkText }}</a
						>
					</div>
				</SplideSlide>
			</Splide>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_group-company';
</style>

<script>
	import { Splide, SplideSlide } from '@splidejs/vue-splide';
	export default {
		data() {
			return {
				groupTitle: {
					title: 'Our Group Companies',
					description:
						'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit dolorem, nemo maiores debitis quod distinctio repellendus. Dolore ipsam veritatis voluptas.',
					descVisibility: true,
				},
				slideContent: [
					{
						imgSrc: '/frontend/images/contents/banner.jpg',
						alt: 'img alt',
						title: 'Jamuna Future Park',
						webLink: '#',
						linkText: 'Visit Website',
					},
					{
						imgSrc: '/frontend/images/contents/banner.jpg',
						alt: 'img alt',
						title: 'Jamuna Future Park',
						webLink: '#',
						linkText: 'Visit Website',
					},
					{
						imgSrc: '/frontend/images/contents/banner.jpg',
						alt: 'img alt',
						title: 'Jamuna Future Park',
						webLink: '#',
						linkText: 'Visit Website',
					},
					{
						imgSrc: '/frontend/images/contents/banner.jpg',
						alt: 'img alt',
						title: 'Jamuna Future Park',
						webLink: '#',
						linkText: 'Visit Website',
					},
					{
						imgSrc: '/frontend/images/contents/banner.jpg',
						alt: 'img alt',
						title: 'Jamuna Future Park',
						webLink: '#',
						linkText: 'Visit Website',
					},
					{
						imgSrc: '/frontend/images/contents/banner.jpg',
						alt: 'img alt',
						title: 'Jamuna Future Park',
						webLink: '#',
						linkText: 'Visit Website',
					},
					{
						imgSrc: '/frontend/images/contents/banner.jpg',
						alt: 'img alt',
						title: 'Jamuna Future Park',
						webLink: '#',
						linkText: 'Visit Website',
					},
					{
						imgSrc: '/frontend/images/contents/banner.jpg',
						alt: 'img alt',
						title: 'Jamuna Future Park',
						webLink: '#',
						linkText: 'Visit Website',
					},
				],
			};
		},
		components: {
			Splide,
			SplideSlide,
		},
		setup() {
			const options = {
				rewind: false,
				arrows: true,
				autoplay: true,
				perPage: 2,
				type: 'loop',
				perMove: 1,
				drag: true,
				pauseOnHover: true,
				cloneStatus: false,
				gap: '2rem',
				fixedWidth: '459.5px',
				focus: 'center',
			};

			return { options };
		},
	};
</script>
