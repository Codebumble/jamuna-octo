<template>
	<Suspense>
		<template #default>
			<home-slider />
		</template>
		<template #fallback>
			<homeSliderSkeleton />
		</template>
	</Suspense>
	<Suspense>
		<template #default>
			<concerns-logo />
		</template>
		<template #fallback>
			<concernsLogoSkeleton />
		</template>
	</Suspense>
	<Suspense>
		<template #default>
			<missionVision />
		</template>
		<template #fallback>
			<missionVisionSkeleton />
		</template>
	</Suspense>
	<indSlide />
	<futureExpansion />
	<about />
	<founder />
	<growing-up-slider />
	<products />
	<events />
	<contact />
</template>

<script>
	import { defineAsyncComponent } from 'vue';

	const homeSlider = defineAsyncComponent({
		loader: () => import('../components/sliders/home-slider'),
		timeout: 2000,
	});
	const concernsLogo = defineAsyncComponent({
		loader: () => import('../components/home/concerns-logo'),
		timeout: 2000,
	});
	const missionVision = defineAsyncComponent({
		loader: () => import('../components/home/mission-vision'),
		timeout: 2000,
	});

	import aboutFounder from '../components/home/about-founder';
	import futureExpansion from '../components/home/future-expansion';
	import products from '../components/home/products';
	import events from '../components/home/events-slider';
	import about from '../components/home/about';
	import indSlide from '../components/home/ind-slider';
	import contact from '../components/home/contact.vue';
	import founder from '../components/home/founder.vue';
	import growingUpSlider from '../components/home/growing-up-slider.vue';

	// Skeleton
	import concernsLogoSkeleton from '../components/skeleton/concerns-logo-skeleton.vue';
	import homeSliderSkeleton from '../components/skeleton/home-slider-skeleton.vue';
	import missionVisionSkeleton from '../components/skeleton/mission-vision-skeleton.vue';

	export default {
		components: {
			homeSlider,
			concernsLogo,
			aboutFounder,
			missionVision,
			futureExpansion,
			products,
			events,
			about,
			indSlide,
			contact,
			founder,
			growingUpSlider,
			// Skeleton
			concernsLogoSkeleton,
			homeSliderSkeleton,
			missionVisionSkeleton,
		},

		data() {
			return {
				FounderDetails: {
					title: '',
				},
				meta: {
					title: '',
					description: '',
					image: '',
				},
			};
		},

		metaInfo() {
			return {
				title: 'Home | Jamuna Group',
				description: this.meta.description,

				og: {
					title: this.meta.title,
					description: this.meta.description,
					image: this.meta.image,
				},
				twitter: {
					title: this.meta.title,
					description: this.meta.description,
					image: this.meta.image,
				},
			};
		},

		mounted() {
			axios
				.get(window.location.origin + '/founder-api/founder-speech')
				.then((response) => {
					this.FounderDetails = response.data.FounderDetails;
				});
			axios
				.get(window.location.origin + '/frontpage-api/meta-data')
				.then((response) => {
					this.meta = response.data;
				});
		},
	};
</script>
