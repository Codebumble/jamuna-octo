<template>
	<home-slider />
	<concerns-logo />
	<!-- <shortBrief /> -->
	<aboutFounder />
	<chairpersonSpeech />
	<missionVission />
	<futureExpension />
	<products />
	<events />
	<metainfo>
		<template v-slot:title="{ content }">{{ content }} - Yay!</template>
	</metainfo>
</template>

<script>
	// import { useHead } from '@vueuse/head';
	import homeSlider from '../components/sliders/home-slider';
	import concernsLogo from '../components/home/concerns-logo';
	// import shortBrief from '../components/home/short-brief';
	import chairpersonSpeech from '../components/home/chairperson-speech';
	import aboutFounder from '../components/home/about-founder';
	import missionVission from '../components/home/mission-vision';
	import futureExpension from '../components/home/future-expansion';
	import products from '../components/home/products';
	import events from '../components/home/events-slider';

	import { useMeta, useActiveMeta } from 'vue-meta';

	export default {
		components: {
			homeSlider,
			concernsLogo,
			// shortBrief,
			chairpersonSpeech,
			aboutFounder,
			missionVission,
			futureExpension,
			products,
			events,
		},
		setup() {
			const metaData = {
				title: 'Example App',
			};

			useMeta({
				title: metaData.title,
			});
			// useHead({
			// 	title: 'Jamuna Group',
			// 	meta: [
			// 		{
			// 			name: `description`,
			// 			content: `Jamuna Group is one of the largest Bangladeshi industrial conglomerates. The industries under this conglomerate include Textiles, Chemicals, Leather, motor cycles, Consumer products, Media, Advertisement etc.`,
			// 		},
			// 		{
			// 			'http-equiv': `Content-Type`,
			// 			content: `text/html; charset=UTF-8`,
			// 		},
			// 		{
			// 			name: 'viewport',
			// 			content:
			// 				'width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui',
			// 		},
			// 	],
			// });
		},
	};
</script>
