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
							document.title = response.data.title
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
