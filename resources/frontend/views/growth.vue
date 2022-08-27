<template>
	<Suspense>
		<template #default>
			<growthHistory />
		</template>
		<template #fallback>
			<growthHistorySkeleton />
		</template>
	</Suspense>
</template>

<script>
import { defineAsyncComponent } from 'vue';
const growthHistory = defineAsyncComponent({
	loader: () => import('../components/management/growth-history'),
	timeout: 2000,
});
// Skeleton
import growthHistorySkeleton from '../components/skeleton/growth-history-skeleton.vue';

export default {
	components: {
		growthHistory,
		growthHistorySkeleton,
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
				image: '',
			},
			twitter: {
				// title: this.breadcrumb.pageTitle,
				// description: this.breadcrumb.pageDesc.substring(0, 150),
				image: '',
			},
		};
	},
};
</script>
