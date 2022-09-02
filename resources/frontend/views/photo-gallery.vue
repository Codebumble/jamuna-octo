<template>
	<Suspense>
		<template #default>
			<photoGallery />
		</template>
		<template #fallback>
			<photoGallerySkeleton />
		</template>
	</Suspense>
</template>

<script>
import { defineAsyncComponent } from 'vue';
const photoGallery = defineAsyncComponent({
	loader: () => import('../components/photo-gallery/photo-gallery'),
	timeout: 2000,
});
// Skeleton
import photoGallerySkeleton from '../components/skeleton/photo-gallery-skeleton.vue';

export default {
	components: {
		photoGallery,
		photoGallerySkeleton,
	},
};
</script>
