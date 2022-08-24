<template>
	<photoGallery />
</template>

<script>
	import photoGallery from '../components/photo-gallery/photo-gallery';
	export default {
		components: {
			photoGallery,
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
