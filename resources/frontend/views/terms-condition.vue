<template>
	<termsNCondition :contents="contents" />
</template>

<script>
	import termsNCondition from '../components/footer/terms-condition.vue';

	export default {
		components: {
			termsNCondition,
		},
		data() {
			return {
				contents: {
					title: '',
					content: '',
					time: '',
				},
			};
		},
		mounted() {
			axios
				.get(window.location.origin + '/frontpage-api/tac-data')
				.then((response) => {
					this.contents = response.data;
				});
		},
	};
</script>
