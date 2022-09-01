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
	data() {
		return {};
	},
	metaInfo() {
		return {
			title: 'Photo Gallery | Jamuna Group',
			// title: this.FounderDetails.title,
			// description: this.breadcrumb.pageDesc.substring(0, 150),
			charset: 'utf-8',
			htmlAttrs: {
				lang: 'en',
			},
			og: {
				// title: this.breadcrumb.pageTitle,
				// description: this.breadcrumb.pageDesc.substring(0, 150),
				image: '',
			},
			twitter: {
				// title: this.breadcrumb.pageTitle,
				// description: this.breadcrumb.pageDesc.substring(0, 150),
				image: '',
			},
		};
	},
};
</script>
