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
		setup() {

		},
	};
</script>
