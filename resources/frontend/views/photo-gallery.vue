<template>
	<breadcrumb :data="breadcrumb" />
	<photoGallery />
</template>

<script>
	import { useHead } from '@vueuse/head';
	import breadcrumb from '../components/global/breadcrumb';
	import photoGallery from '../components/photo-gallery/photo-gallery';
	export default {
		components: {
			breadcrumb,
			photoGallery,
		},
		data() {
			return {
				breadcrumb: {
					pageTitle: 'Photo Gallery',
					pageDesc:
						'Jamuna Group is committed to ensure better life through quality products.',
				},
			};
		},
		setup() {
			useHead({
				title: 'Photo Gallery | Jamuna Group',
				meta: [
					{
						name: `description`,
						content: `Jamuna Group is one of the largest Bangladeshi industrial conglomerates. The industries under this conglomerate include Textiles, Chemicals, Leather, motor cycles, Consumer products, Media, Advertisement etc.`,
					},
					{
						'http-equiv': `Content-Type`,
						content: `text/html; charset=UTF-8`,
					},
					{
						name: 'viewport',
						content:
							'width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui',
					},
				],
			});
		},
	};
</script>
