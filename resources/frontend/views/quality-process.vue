<template>
	<breadcrumb :data="breadcrumb" />
	<qualityProcess />
</template>

<script>
	import breadcrumb from '../components/global/breadcrumb';
	import qualityProcess from '../components/management/quality-process.vue';
	export default {
		components: {
			breadcrumb,
			qualityProcess,
		},
		data() {
			return {
				breadcrumb: {
					pageTitle: 'Quality process',
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
