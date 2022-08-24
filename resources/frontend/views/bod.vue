<template>
	<directors />
</template>

<script>
	import directors from '../components/about/directors';
	export default {
		components: {
			directors,
		},
		data() {
			return {};
		},
		metaInfo() {
			return {
				// title: this.breadcrumb.pageTitle,
				// title: this.FounderDetails.title,
				description: 'test',
				charset: 'utf-8',
				author: 'me',
				htmlAttrs: {
					lang: 'en',
				},
				og: {
					// title: this.breadcrumb.pageTitle,
					description: 'test',
					image: 'https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png',
				},
				twitter: {
					// title: this.breadcrumb.pageTitle,
					description: 'lol',
					image: 'https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png',
				},
			};
		},
		mounted() {
			axios
				.get(window.location.origin + '/frontpage-api/directors-list')
				.then((response) => {
					// this.heading = response.data.heading;
					// this.breadcrumb = response.data.breadcrumb;
				});
		},
	};
</script>
