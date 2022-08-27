<template>
		<Suspense>
		<template #default>
			<qualityProcess />
		</template>
		<template #fallback>
			<qualityProcessSkeleton />
		</template>
	</Suspense>
</template>

<script>
import { defineAsyncComponent } from 'vue';
const qualityProcess = defineAsyncComponent({
	loader: () => import('../components/management/quality-process.vue'),
	timeout: 2000,
});
// Skeleton
import qualityProcessSkeleton from '../components/skeleton/quality-process-skeleton.vue';
	export default {
		components: {
			qualityProcess,
			qualityProcessSkeleton
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
