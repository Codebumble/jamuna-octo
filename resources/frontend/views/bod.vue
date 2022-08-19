<template>
	<breadcrumb :data="breadcrumb" />
	<directors />
</template>

<script>
	import { useHead } from '@vueuse/head';
	import directors from '../components/about/directors';
	import breadcrumb from '../components/global/breadcrumb';
	export default {
		components: {
			directors,
			breadcrumb,
		},
		data() {
			return {
				breadcrumb: {},
			};
		},
		setup() {
			useHead({
				title: 'Board of Directors | Jamuna Group',
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
		mounted() {
			axios
				.get(window.location.origin + '/frontpage-api/directors-list')
				.then((response) => {
					// this.heading = response.data.heading;
					this.breadcrumb = response.data.breadcrumb;
				});
		},
	};
</script>
