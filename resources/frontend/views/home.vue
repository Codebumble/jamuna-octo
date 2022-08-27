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

	<futureExpansion />
	<products />
	<events />
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
