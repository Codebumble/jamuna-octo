<template>
	<breadcrumb :data="breadcrumb" />
	<newsCenter />
</template>

<script>
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

		},
	};
</script>
