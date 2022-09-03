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
			};
		},
		created() {
			this.xswitcher();
			this.$watch(
				() => this.$route.params,
				(toParams, PreviousParams) => {
					this.xswitcher();
				}
			);
		},
		methods: {
			xswitcher() {
				if (this.$route.params.id) {
					axios
						.get(
							window.location.origin +
								'/frontpage-api/media-center/' +
								this.$route.params.id
						)
						.then((response) => {
							document.title = response.data.title;
							const data = response.data;

							this.mediaCenter.ytSrc = data.ytSrc;
							this.mediaCenter.title = data.title;
							this.mediaCenter.phone = data.phone;
							this.mediaCenter.email = data.email;
							this.mediaCenter.address.officeName =
								data.address.officeName;
							this.mediaCenter.address.road = data.address.road;
							this.mediaCenter.distHeading.title =
								data.distHeading.title;
							this.mediaCenter.distHeading.desc =
								data.distHeading.desc;
							this.mediaCenter.distCorres = data.distCorres;

							// this.mediaCenter = {
							// 	...this.mediaCenter,
							// 	ytSrc: data.ytSrc,
							// 	title: data.title,
							// 	phone: data.phone,
							// 	email: data.email,
							// 	address: {
							// 		officeName: data.address.officeName,
							// 		road: data.address.road,
							// 	},
							// 	distHeading: {
							// 		title: data.distHeading.title,
							// 		desc: data.distHeading.desc,
							// 	},
							// };

							// data.distCorres.forEach((item) => {
							// 	this.mediaCenter.distCorres.push(item);
							// });
						});
				}
			},
		},
	};
</script>
