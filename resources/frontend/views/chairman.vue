<template>
	<Suspense>
		<template #default>
			<chairman />
		</template>
		<template #fallback>
			<chairmanSkeleton />
		</template>
	</Suspense>
</template>

<script>
import { defineAsyncComponent } from 'vue';
const chairman = defineAsyncComponent({
	loader: () => import('../components/about/chairman-speech'),
	timeout: 2000,
});
// Skeleton
import chairmanSkeleton from '../components/skeleton/chairman-speech-skeleton.vue';
export default {
	components: {
		chairman,
		chairmanSkeleton,
	},
	mounted() {
		document.title = 'Chairman | Jamuna Group'
	},
};
</script>
