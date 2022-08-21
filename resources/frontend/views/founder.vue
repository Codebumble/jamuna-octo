<template>
	<breadcrumb :data="breadcrumb" />
	<founder />
</template>

<script>
	import { useHead } from '@vueuse/head';
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
			// useHead({
			// 	title: 'Founder | Jamuna Group',
			// 	meta: [
			// 		{
			// 			name: `description`,
			// 			content: `blalala`,
			// 		},
			// 		{
			// 			name: `keywords`,
			// 			content: `codebumble`,
			// 		},
			// 	],
			// });
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
