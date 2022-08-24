<template>
	<chairman />
</template>

<script>
	import chairman from '../components/about/chairman-speech';
	export default {
		components: {
			chairman,
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
					// image: '/profile-image/' + this.quote.imgSrc,
				},
				twitter: {
					// title: this.breadcrumb.pageTitle,
					// description: this.breadcrumb.pageDesc.substring(0, 150),
					// image: '/profile-image/' + this.quote.imgSrc,
				},
			};
		},
		mounted() {
			axios
				.get(window.location.origin + '/founder-api/founder-speech')
				.then((response) => {
					// this.quote = response.data.quote;
				});
		},
	};
</script>
