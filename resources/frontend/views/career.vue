<template>
	<Suspense>
		<template #default>
			<joblist />
		</template>
		<template #fallback>
			<joblistSkeleton />
		</template>
	</Suspense>

</template>

<script>
	import { defineAsyncComponent } from 'vue';
	const joblist = defineAsyncComponent({
		loader: () => import('../components/global/joblist'),
		timeout: 2000,
	});
	// Skeleton
	import joblistSkeleton from '../components/skeleton/joblist-skeleton.vue';

	export default {
		components: {
			joblist,
			joblistSkeleton
		},
		mounted() {
			document.title = 'Career | Jamuna Group'
		},
	};
</script>
