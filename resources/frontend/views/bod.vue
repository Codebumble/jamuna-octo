<template>
	<breadcrumb :data="breadcrumb" />
	<directors />
</template>

<script>
	import directors from '../components/about/directors';
	import breadcrumb from '../components/global/breadcrumb';
	export default {
		components: {
			directors,
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
				.get(window.location.origin + '/frontpage-api/directors-list')
				.then((response) => {
					// this.heading = response.data.heading;
					this.breadcrumb = response.data.breadcrumb;
				});
		},
	};
</script>
