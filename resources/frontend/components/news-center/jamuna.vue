<template>
	<newsCenter :data="mediaCenter" />
</template>

<script>
	import newsCenter from '../global/news-center.vue';
	export default {
		components: {
			newsCenter,
		},
		data() {
			return {
				mediaCenter: {
					ytSrc: '',
					title: '',
					phone: '',
					email: '',
					address: {
						officeName: '',
						road: '',
					},
					distHeading: {
						title: '',
						desc: '',
					},
					
					distCorres: [],
				},
				// mediaCenter: {
				// 	ytSrc: 'https://www.youtube.com/embed/Kaat7BzcEI0',
				// 	title: 'Jamuna Television known as "Jamuna TV" is a 24 hour news channel of Bangladesh',
				// 	phone: ' +88032135131',
				// 	email: 'hello@jamuna.tv',
				// 	address: {
				// 		officeName: 'Jamuna Television LTD.',
				// 		road: 'KA-244 Jamuna Future Oark Complex',
				// 	},
				// 	distHeading: {
				// 		title: 'Correspondence by Disctrict',
				// 		desc: "Jamuna TV has it's own correspondence office in Dhaka. We are the only TV station in Bangladesh to have a correspondence office by district.",
				// 	},
				// 	distCorres: [
				// 		{
				// 			imgSrc: '/frontend/images/directors/mem1-1.jpg',
				// 			alt: 'Jamuna TV',
				// 			name: 'Mrs. Salma Islam',
				// 			position: 'Chairman',
				// 			areas: 'dinajpur',
				// 		},
				// 		{
				// 			imgSrc: '/frontend/images/directors/mem1-1.jpg',
				// 			alt: 'Jamuna TV',
				// 			name: 'Mrs. Salma Islam',
				// 			position: 'Chairman',
				// 			areas: 'dinajpur',
				// 		},
				// 		{
				// 			imgSrc: '/frontend/images/directors/mem1-1.jpg',
				// 			alt: 'Jamuna TV',
				// 			name: 'Mrs. Salma Islam',
				// 			position: 'Chairman',
				// 			areas: 'dinajpur',
				// 		},
				// 		{
				// 			imgSrc: '/frontend/images/directors/mem1-1.jpg',
				// 			alt: 'Jamuna TV',
				// 			name: 'Mrs. Salma Islam',
				// 			position: 'Chairman',
				// 			areas: 'dinajpur',
				// 		},
				// 		{
				// 			imgSrc: '/frontend/images/directors/mem1-1.jpg',
				// 			alt: 'Jamuna TV',
				// 			name: 'Mrs. Salma Islam',
				// 			position: 'Chairman',
				// 			areas: 'dinajpur',
				// 		},
				// 	],
				// 	subDistCorres: [
				// 		{
				// 			imgSrc: '/frontend/images/directors/mem1-1.jpg',
				// 			alt: 'Jamuna TV',
				// 			name: 'Mrs. Salma Islam',
				// 			position: 'Chairman',
				// 			areas: 'dinajpur',
				// 		},
				// 		{
				// 			imgSrc: '/frontend/images/directors/mem1-1.jpg',
				// 			alt: 'Jamuna TV',
				// 			name: 'Mrs. Salma Islam',
				// 			position: 'Chairman',
				// 			areas: 'dinajpur',
				// 		},
				// 		{
				// 			imgSrc: '/frontend/images/directors/mem1-1.jpg',
				// 			alt: 'Jamuna TV',
				// 			name: 'Mrs. Salma Islam',
				// 			position: 'Chairman',
				// 			areas: 'dinajpur',
				// 		},
				// 		{
				// 			imgSrc: '/frontend/images/directors/mem1-1.jpg',
				// 			alt: 'Jamuna TV',
				// 			name: 'Mrs. Salma Islam',
				// 			position: 'Chairman',
				// 			areas: 'dinajpur',
				// 		},
				// 		{
				// 			imgSrc: '/frontend/images/directors/mem1-1.jpg',
				// 			alt: 'Jamuna TV',
				// 			name: 'Mrs. Salma Islam',
				// 			position: 'Chairman',
				// 			areas: 'dinajpur',
				// 		},
				// 	],
				// },
			};
		},
		created() {
			this.switcher();
			this.$watch(
				() => this.$route.params,
				(toParams, PreviousParams) => {
					this.switcher();
				}
			);
		},
		methods: {
			switcher() {
				if (this.$route.params.id) {
					axios
						.get(
							window.location.origin +
								'/frontpage-api/media-center/' +
								this.$route.params.id
						)
						.then((response) => {
							const data = response.data;
							this.mediaCenter = {
								...this.mediaCenter,
								ytSrc: data.ytSrc,
								title: data.title,
								phone: data.phone,
								email: data.email,
								address: {
									officeName: data.address.officeName,
									road: data.address.road,
								},
								distHeading: {
									title: data.distHeading.title,
									desc: data.distHeading.desc,
								},
							};

							data.distCorres.forEach((item) => {
								this.mediaCenter.distCorres.push(item);
							});
						});
				}
			},
		},
	};
</script>
