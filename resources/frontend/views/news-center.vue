<template>
		<Suspense>
		<template #default>
			<newsCenter />
		</template>
		<template #fallback>
			<newsCenterSkeleton />
		</template>
	</Suspense>
</template>

<script>
import { defineAsyncComponent } from 'vue';
const newsCenter = defineAsyncComponent({
	loader: () => import('../components/news-center/news-center'),
	timeout: 2000,
});
// Skeleton
import newsCenterSkeleton from '../components/skeleton/directors-skeleton.vue';

	export default {
		components: {
			newsCenter,
			newsCenterSkeleton
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
