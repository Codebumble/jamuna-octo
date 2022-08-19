<template>
	<breadcrumb :data="breadcrumb" />
	<newsCenter />
</template>

<script>
	import { useHead } from '@vueuse/head';
	import newsCenter from '../components/news-center/news-center';
	import breadcrumb from '../components/global/breadcrumb.vue';
	export default {
		components: {
			newsCenter,
			breadcrumb,
		},
		data() {
			return {
				breadcrumb: {
					pageTitle: 'News Center',
					pageDesc:
						'Jamuna Group is committed to ensure better life through quality products.',
				},
			};
		},
		setup() {
			useHead({
				title: 'News Center | Jamuna Group',
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
