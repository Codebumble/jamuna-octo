<template>
	<Suspense>
		<template #default>
			<founder />
		</template>
		<template #fallback>
			<founderSkeleton />
		</template>
	</Suspense>
</template>

<script>
	import { defineAsyncComponent } from 'vue';
	const founder = defineAsyncComponent({
		loader: () => import('../components/about/founder-speech'),
		timeout: 2000,
	});
	// Skeleton
	import founderSkeleton from '../components/skeleton/founder-speech-skeleton.vue';

	export default {
		components: {
			founder,
			founderSkeleton,
		},
		data() {
			return {};
		},
		mounted() {
			document.title = 'Founder | Jamuna Group'
		},

	};
</script>
