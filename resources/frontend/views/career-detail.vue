<template>
	<Suspense>
		<template #default>
			<careerDetail />
		</template>
		<template #fallback>
			<careerDetailSkeleton />
		</template>
	</Suspense>
</template>

<script>
	import { defineAsyncComponent } from 'vue';
	const careerDetail = defineAsyncComponent({
		loader: () => import('./career-detailMain.vue'),
		timeout: 2000,
	});
	// Skeleton
	import careerDetailSkeleton from '../components/skeleton/career-detail-skeleton.vue';

	export default {
		components: {
			careerDetail,
			careerDetailSkeleton,
		},
		mounted() {
			document.title = 'Career | Jamuna Group';
		},
	};
</script>
