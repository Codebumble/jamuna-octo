<template>
	<breadcrumb :data="breadcrumb" />
	<futureExpansion />
</template>

<script>
	import breadcrumb from '../components/global/breadcrumb';
	import futureExpansion from '../components/management/future-expansion.vue';
	export default {
		components: {
			breadcrumb,
			futureExpansion,
		},
		data() {
			return {
				breadcrumb: {
					pageTitle: 'Future Expansion',
					pageDesc:
						'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum animi aliquam voluptates harum aspernatur eveniet velit doloribus aliquid adipisci suscipit?',
				},
			};
		},
		setup() {

		},
	};
</script>
