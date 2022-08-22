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
		metaInfo() {
			return {
				title: this.breadcrumb.pageTitle,
				// title: this.FounderDetails.title,
				description: this.breadcrumb.pageDesc.substring(0, 150),
				charset: 'utf-8',
				htmlAttrs: {
					lang: 'en',
				},
				og: {
					title: this.breadcrumb.pageTitle,
					description: this.breadcrumb.pageDesc.substring(0, 150),
					image: '',
				},
				twitter: {
					title: this.breadcrumb.pageTitle,
					description: this.breadcrumb.pageDesc.substring(0, 150),
					image: '',
				},
			};
		},
	};
</script>
