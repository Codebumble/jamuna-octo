<template>
	<growthHistory />
</template>

<script>
	import growthHistory from '../components/management/growth-history';
	export default {
		components: {
			growthHistory,
		},
		data() {
			return {};
		},
		metaInfo() {
			return {
				// title: this.breadcrumb.pageTitle,
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
