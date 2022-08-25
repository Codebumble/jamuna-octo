<template>
	<div class="image-gallery pb-16 pt-32">
		<div class="container">
			<div
				class="grid grid-cols-1 lg:grid-cols-4 2xl:grid-cols-5 md:grid-cols-2 gap-5 2xl:gap-3 pb-8">
				<div
					v-for="(item, index) in imgs"
					:key="index"
					class="image"
					@click="() => showImg(index)">
					<div class="thumbnail">
						<img
							:src="item.src"
							alt="" />
					</div>
				</div>
			</div>
			<vue-easy-lightbox
				:visible="visibleRef"
				:imgs="imgs"
				:index="indexRef"
				@hide="onHide"></vue-easy-lightbox>
		</div>
	</div>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/image-gallery';
</style>

<script>
	import VueEasyLightbox from 'vue-easy-lightbox';

	export default {
		components: {
			VueEasyLightbox,
		},
		data() {
			return {
				visibleRef: false,
				indexRef: 0,
				imgs: [],
			};
		},
		mounted() {
			axios
				.get(window.location.origin + '/frontpage-api/gallery-api')
				.then((res) => {
					res.data.forEach((item) =>
						this.imgs.push({
							src: item.src,
							// title: item.author,
						})
					);
				});
		},
		methods: {
			showImg(index) {
				this.indexRef = index;
				this.visibleRef = true;
			},
			onHide() {
				this.visibleRef = false;
			},
		},
	};
</script>
