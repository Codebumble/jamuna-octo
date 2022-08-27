<template>
	<Suspense>
		<template #default>
			<chairman />
		</template>
		<template #fallback>
			<chairmanSkeleton />
		</template>
	</Suspense>
</template>

<script>
import { defineAsyncComponent } from 'vue';
const chairman = defineAsyncComponent({
	loader: () => import('../components/about/chairman-speech'),
	timeout: 2000,
});
// Skeleton
import chairmanSkeleton from '../components/skeleton/chairman-speech-skeleton.vue';
export default {
	components: {
		chairman,
		chairmanSkeleton,
	},
	data() {
		return {};
	},
	metaInfo() {
		return {
			// title: this.breadcrumb.pageTitle,
			// title: this.FounderDetails.title,
			// description: this.breadcrumb.pageDesc.substring(0, 150),
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
