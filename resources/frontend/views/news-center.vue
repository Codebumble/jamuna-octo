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
	};
</script>
