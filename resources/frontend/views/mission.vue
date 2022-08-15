<template>
	<breadcrumb :data="breadcrumb" />
	<missionVision />
</template>

<script>
	import { useHead } from '@vueuse/head';
	import breadcrumb from '../components/global/breadcrumb';
	import missionVision from '../components/management/mission-vision';
	export default {
		components: {
			breadcrumb,
			missionVision,
		},
		data() {
			return {
				breadcrumb: {
					image: '/frontend/images/breadcrumb/directors.jpg',
					alt: 'directors',
					pageTitle: 'Mission & Vision',
					pageDesc:
						'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum animi aliquam voluptates harum aspernatur eveniet velit doloribus aliquid adipisci suscipit?',
				},
			};
		},
		setup() {
			useHead({
				title: 'Mission Vision | Jamuna Group',
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
