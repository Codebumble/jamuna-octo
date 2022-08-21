<template>
	<breadcrumb :data="breadcrumb" />
	<joblist />
</template>

<script>
	import breadcrumb from '../components/global/breadcrumb';
	import joblist from '../components/global/joblist';
	export default {
		components: {
			breadcrumb,
			joblist,
		},
		data() {
			return {
				breadcrumb: {
					pageTitle: 'Career',
					pageDesc:
						'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum animi aliquam voluptates harum aspernatur eveniet velit doloribus aliquid adipisci suscipit?',
				},
			};
		},
		setup() {
		},
	};
</script>
