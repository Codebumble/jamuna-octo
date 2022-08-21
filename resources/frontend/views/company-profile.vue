<template>
	<breadcrumb :data="breadcrumb" />
	<companyProfile />
</template>

<script>
	import breadcrumb from '../components/global/breadcrumb';
	import companyProfile from '../components/about/company-profile';
	export default {
		components: {
			breadcrumb,
			companyProfile,
		},
		data() {
			return {
				breadcrumb: {
					pageTitle: 'Company Profile',
					pageDesc:
						'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum animi aliquam voluptates harum aspernatur eveniet velit doloribus aliquid adipisci suscipit?',
				},
			};
		},
		setup() {

		},
	};
</script>
