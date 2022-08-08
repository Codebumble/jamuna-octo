<template>
	<home-slider />
	<concerns-logo />
	<shortBrief />
	<chairpersonSpeech />
</template>

<script>
	import { useHead } from '@vueuse/head';
	import homeSlider from '../components/sliders/home-slider';
	import concernsLogo from '../components/home/concerns-logo';
	import shortBrief from '../components/home/short-brief';
	import chairpersonSpeech from '../components/home/chairperson-speech';

	export default {
		components: {
			homeSlider,
			concernsLogo,
			shortBrief,
			chairpersonSpeech,
		},
		setup() {
			useHead({
				title: 'Jamuna Group',
				meta: [
					{
						name: `description`,
						content: `Jamuna Group is one of the largest Bangladeshi industrial conglomerates. The industries under this conglomerate include Textiles, Chemicals, Leather, motor cycles, Consumer products, Media, Advertisement etc.`,
					},
					{
						'http-equiv': `Content-Type`,
						content: `text/html; charset=UTF-8`,
					},
					{
						name: 'viewport',
						content:
							'width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui',
					},
				],
			});
		},
	};
</script>
