<template>
	<breadcrumb :data="breadcrumb" />
	<founder />
</template>

<script>
	import founder from '../components/about/founder-speech';
	import breadcrumb from '../components/global/breadcrumb';
	export default {
		components: {
			founder,
			breadcrumb,
		},
		data() {
			return {
				breadcrumb: {},
			};
		},
		setup() {

		},
		mounted() {
			axios
				.get(window.location.origin + '/founder-api/founder-speech')
				.then((response) => {
					this.breadcrumb = response.data.breadcrumb;
				});
		},
	};
</script>
