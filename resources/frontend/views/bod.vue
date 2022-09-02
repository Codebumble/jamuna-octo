<template>
	<Suspense>
		<template #default>
			<directors />
		</template>
		<template #fallback>
			<directorsSkeleton />
		</template>
	</Suspense>
</template>

<script>
import { defineAsyncComponent } from 'vue';
const directors = defineAsyncComponent({
	loader: () => import('../components/about/directors'),
	timeout: 2000,
});
// Skeleton
import directorsSkeleton from '../components/skeleton/directors-skeleton.vue';

export default {
	components: {
		directors,
		directorsSkeleton,
	},
	mounted() {
		document.title = 'Board Of Directors | Jamuna Group'
	},
};
</script>
