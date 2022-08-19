<template>
	<!-- <breadcrumb :data="breadcrumb" /> -->
	<nfoundation />
</template>

<script>
	import { useHead } from '@vueuse/head';
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
			useHead({
				title: 'Nurul Islam Foundation | Jamuna Group',
				meta: [
					{
						name: `description`,
						content: `blalala`,
					},
					{
						name: `keywords`,
						content: `codebumble`,
					},
				],
			});
		},
	};
</script>
