<template>
	<Suspense>
		<template #default>
			<founder />
		</template>
		<template #fallback>
			<founderSkeleton />
		</template>
	</Suspense>
</template>

<script>
import { defineAsyncComponent } from 'vue';
const founder = defineAsyncComponent({
	loader: () => import('../components/about/founder-speech'),
	timeout: 2000,
});
// Skeleton
import founderSkeleton from '../components/skeleton/founder-speech-skeleton.vue';

export default {
	components: {
		founder,
		founderSkeleton,
	},
	data() {
		return {};
	},
	metaInfo() {
		return {
			charset: 'utf-8',
			htmlAttrs: {
				lang: 'en',
			},
			og: {
				// title: this.breadcrumb.pageTitle,
				// description: this.breadcrumb.pageDesc.substring(0, 150),
				// image: '/profile-image/' + this.quote.imgSrc,
			},
			twitter: {
				// title: this.breadcrumb.pageTitle,
				// description: this.breadcrumb.pageDesc.substring(0, 150),
				// image: '/profile-image/' + this.quote.imgSrc,
			},
		};
	},
	mounted() {
		axios
			.get(window.location.origin + '/founder-api/founder-speech')
			.then((response) => {
				// this.quote = response.data.quote;
			});
	},
};
</script>
