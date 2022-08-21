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
		setup() {

		},
	};
</script>
