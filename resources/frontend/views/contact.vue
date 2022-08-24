<template>
	<contact />
</template>

<script>
	import contact from '../components/contact/contact';
	export default {
		components: {
			contact,
		},
		data() {
			return {};
		},
		metaInfo() {
			return {
				// title: this.breadcrumb.pageTitle,
				// title: this.FounderDetails.title,
				// description: this.breadcrumb.pageDesc.substring(0, 150),
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
		setup() {},
	};
</script>
