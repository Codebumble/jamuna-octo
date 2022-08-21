<template>
	<breadcrumb :data="breadcrumb" />
	<growthHistory />
</template>

<script>
	import breadcrumb from '../components/global/breadcrumb';
	import growthHistory from '../components/management/growth-history';
	export default {
		components: {
			breadcrumb,
			growthHistory,
		},
		data() {
			return {
				breadcrumb: {
					pageTitle: 'Growth History',
					pageDesc:
						'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum animi aliquam voluptates harum aspernatur eveniet velit doloribus aliquid adipisci suscipit?',
				},
			};
		},
		setup() {},
	};
</script>
