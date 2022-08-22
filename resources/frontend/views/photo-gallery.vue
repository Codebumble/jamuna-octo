<template>
	<breadcrumb :data="breadcrumb" />
	<photoGallery />
</template>

<script>
	import breadcrumb from '../components/global/breadcrumb';
	import photoGallery from '../components/photo-gallery/photo-gallery';
	export default {
		components: {
			breadcrumb,
			photoGallery,
		},
		data() {
			return {
				breadcrumb: {
					pageTitle: 'Photo Gallery',
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
