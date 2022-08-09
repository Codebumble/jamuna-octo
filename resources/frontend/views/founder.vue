<template>
	<founder />
</template>

<script>
	import { useHead } from '@vueuse/head';
	import founder from '../components/about/founder-speech';
	export default {
		components: {
			founder,
		},
		setup() {
			useHead({
				title: 'Founder | Jamuna Group',
				meta: [
					{
						name: `description`,
						content: `blalala`,
					},
					{
						name: `keywords`,
						content: `codebumble`,
					},
				],
			});
		},
	};
</script>
