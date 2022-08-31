<template>
	<privacyPolicy/>
</template>

<script>

import privacyPolicy from '../components/footer/privacy-policy'

export default {
	components: {
		privacyPolicy
	},
	data() {
		return {};
	},
	setup() {},
	metaInfo() {
		return {
			title: 'Frequently Asked Question',
			description: '',
			charset: 'utf-8',
			htmlAttrs: {
				lang: 'en',
			},
			og: {
				title: '',
				description: '',
				image: '',
			},
			twitter: {
				title: '',
				description: '',
				image: '',
			},
		};
	},
	methods: {},
	created() {},
	mounted() {},
};
</script>
