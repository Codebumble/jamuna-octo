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
		}
	};
</script>
