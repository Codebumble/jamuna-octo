<template>
	<breadcrumb :data="breadcrumb" />
	<jdgu />
</template>

<script>
	import breadcrumb from '../components/global/breadcrumb';
	import jdgu from '../components/jamuna-sector/jdgu';
	export default {
		components: {
			jdgu,
			breadcrumb,
		},
		data() {
			return {
				breadcrumb: {
					pageTitle: 'Jamuna Denims Garments LTD',
					pageDesc:
						'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum animi aliquam voluptates harum aspernatur eveniet velit doloribus aliquid adipisci suscipit?',
				},
			};
		},
		setup() {

		},
	};
</script>
