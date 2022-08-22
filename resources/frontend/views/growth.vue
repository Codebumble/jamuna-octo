<template>
	<breadcrumb :data="breadcrumb" />
	<growthHistory />
</template>

<script>
	import breadcrumb from '../components/global/breadcrumb';
	import growthHistory from '../components/management/growth-history';
	export default {
		components: {
			breadcrumb,
			growthHistory,
		},
		data() {
			return {
				breadcrumb: {
					pageTitle: 'Growth History',
					pageDesc:
						'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum animi aliquam voluptates harum aspernatur eveniet velit doloribus aliquid adipisci suscipit?',
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
