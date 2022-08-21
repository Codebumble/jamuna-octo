<template>
	<breadcrumb :data="breadcrumb" />
	<qualityProcess />
</template>

<script>
	import breadcrumb from '../components/global/breadcrumb';
	import qualityProcess from '../components/management/quality-process.vue';
	export default {
		components: {
			breadcrumb,
			qualityProcess,
		},
		data() {
			return {
				breadcrumb: {
					pageTitle: 'Quality process',
					pageDesc:
						'Jamuna Group is committed to ensure better life through quality products.',
				},
			};
		},
		setup() {

		},
	};
</script>
