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
</template>

<script>
	import homeSlider from '../components/sliders/home-slider';
	import concernsLogo from '../components/home/concerns-logo';
	import chairpersonSpeech from '../components/home/chairperson-speech';
	import aboutFounder from '../components/home/about-founder';
	import missionVission from '../components/home/mission-vision';
	import futureExpension from '../components/home/future-expansion';
	import products from '../components/home/products';
	import events from '../components/home/events-slider';

	export default {
		components: {
			homeSlider,
			concernsLogo,
			chairpersonSpeech,
			aboutFounder,
			missionVission,
			futureExpension,
			products,
			events,
		},

		data() {
			return {
				FounderDetails: {
					title: '',
				},
			};
		},

		metaInfo() {
			return {
				title: 'Home',
				// title: this.FounderDetails.title,
				description: 'test',
				charset: 'utf-8',
				author: 'me',
				htmlAttrs: {
					lang: 'en',
				},
				og: {
					title: 'Home',
					description: 'test',
					image: 'https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png',
				},
				twitter: {
					title: 'Home',
					description: 'lol',
					image: 'https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png',
				},
			};
		},

		mounted() {
			axios
				.get(window.location.origin + '/founder-api/founder-speech')
				.then((response) => {
					this.FounderDetails = response.data.FounderDetails;
				});
		},
	};
</script>
