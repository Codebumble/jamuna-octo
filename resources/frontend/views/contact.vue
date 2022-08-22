<template>
	<breadcrumb :data="breadcrumb" />
	<contact />
</template>

<script>
	import breadcrumb from '../components/global/breadcrumb';
	import contact from '../components/contact/contact';
	export default {
		components: {
			breadcrumb,
			contact,
		},
		data() {
			return {
				breadcrumb: {
					pageTitle: 'Contact',
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
		setup() {},
	};
</script>
