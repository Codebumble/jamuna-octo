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
};
</script>
