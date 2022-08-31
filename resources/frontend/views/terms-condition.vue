<template>
	<termsNCondition/>
</template>

<script>

import termsNCondition from '../components/footer/terms-condition.vue'

export default {
	components: {
		termsNCondition
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
