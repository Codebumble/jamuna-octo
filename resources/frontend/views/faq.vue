<template>
	<faq :contents="contents" />
</template>

<script>
import faq from '../components/footer/faq.vue';

export default {
	components: {
		faq,
	},
	data() {
		return {
			contents: {
				header: {
					title: '',
					desc: ''
				},
				items: [],
			},
		};
	},
	setup() {},
	metaInfo() {
		return {
			title: 'Frequently Asked Question | Jamuna Group',
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
	created() {
		axios
		.get(window.location.origin + '/frontpage-api/faq-api')
		.then(response => {
			const contents = response.data;
			this.contents.header = {
				title: contents.header.title,
				desc: contents.header.desc,
			}
			contents.items.forEach(item => {
				this.contents.items.push(item)
			})
		})
	},
	mounted() {},
};
</script>
