<template>
	<privacyPolicy :contents="contents" />
</template>

<script>
	import privacyPolicy from '../components/footer/privacy-policy.vue';

	export default {
		components: {
			privacyPolicy,
		},
		data() {
			return {
				contents: {
					title: '',
					time: '',
					content: '',
				},
			};
		},
		setup() {},
		methods: {},
		created() {
			axios
				.get(window.location.origin + '/frontpage-api/privacy-data')
				.then(response => {
					this.contents = response.data
				})
		},
		mounted() {
			document.title = 'Privacy Policy | Jamuna Group'
		},
	};
</script>
