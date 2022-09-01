<template>
	<Suspense>
		<template #default>
			<jamunaTv />
		</template>
		<template #fallback>
			<newsCenterSkeleton />
		</template>
	</Suspense>

</template>
<script>
import { defineAsyncComponent } from 'vue';
const jamunaTv = defineAsyncComponent({
	loader: () => import('../components/news-center/jamuna'),
	timeout: 2000,
});
// Skeleton
import newsCenterSkeleton from '../components/skeleton/news-center-skeleton2.vue';

	export default {
		components: {
			jamunaTv,
			newsCenterSkeleton
		},
	};
</script>
