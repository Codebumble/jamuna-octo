<template>
	<breadcrumb :data="breadcrumb" />
	<jamunaTv />
</template>
<script>
	import jamunaTv from '../components/news-center/jamuna';
	import breadcrumb from '../components/global/breadcrumb.vue';
	export default {
		components: {
			jamunaTv,
			breadcrumb,
		},
		data() {
			return {
				breadcrumb: {
					pageTitle: 'Jamuna Television',
					pageDesc:
						'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum animi aliquam voluptates harum aspernatur eveniet velit doloribus aliquid adipisci suscipit?',
				},
			};
		},
		setup() {

		},
	};
</script>
