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
					title: 'Frequently Asked Question',
					desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus quasi dicta itaque deleniti cum nemo porro quis molestiae unde ipsam modi quia reiciendis velit, animi quidem eos distinctio aut beatae.'
				},
				items: [
					{
						content: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, aliquam dolores, perferendis sint consectetur ipsam amet veniam voluptatibus similique, animi nesciunt fugit. Architecto sit consequatur, asperiores optio quod atque possimus!',
						title: 'Item 1',
					},
					{
						content: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, aliquam dolores, perferendis sint consectetur ipsam amet veniam voluptatibus similique, animi nesciunt fugit. Architecto sit consequatur, asperiores optio quod atque possimus!',
						title: 'Item 2',
					},
					{
						content: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, aliquam dolores, perferendis sint consectetur ipsam amet veniam voluptatibus similique, animi nesciunt fugit. Architecto sit consequatur, asperiores optio quod atque possimus!',
						title: 'Item 3',
					},
				],
			},
		};
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
