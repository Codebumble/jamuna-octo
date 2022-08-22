<template>
	<!-- <breadcrumb :data="breadcrumb" /> -->
	<nfoundation />
</template>

<script>
	import nfoundation from '../components/nfoundation/nfoundation.vue';
	export default {
		components: {
			nfoundation,
		},
		data() {
			return {
				breadcrumb: {
					pageTitle: 'Nurul Islam Foundation',
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
