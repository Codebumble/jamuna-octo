<template>
	<div class="image-gallery pb-16 pt-32">
		<div class="container">
			<div class="text-center pb-12">
				<h2
					class="font-bold text-2xl lg:text-3xl text-gray-800 underline decoration-2 decoration-solid decoration-gray-800 underline-offset-[1rem]">
					Photo Gallery
				</h2>
			</div>
			<div
				class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 gap-5 pb-8">
				<div
					v-for="(item, index) in visibleImages"
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
			<vue-awesome-paginate
				:total-items="totalImages"
				:items-per-page="8"
				:max-pages-shown="1000"
				:current-page="currentPage"
				:on-click="onClickHandler"
				:key="currentPage"
				v-if="totalImages > 4">
				<template #prev-button>
					<i class="fas fa-angle-left"></i>
				</template>
				<template #next-button>
					<i class="fas fa-angle-right"></i>
				</template>
			</vue-awesome-paginate>
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
	@import '../../assets/scss/variables/pagination';
</style>

<script>
	import VueEasyLightbox from 'vue-easy-lightbox';

	export default {
		components: {
			VueEasyLightbox,
		},
		computed: {
			visibleImages() {
				return this.imgs.slice(0, this.images);
			},
		},
		data() {
			return {
				visibleRef: false,
				indexRef: 0,
				imgs: [],
				page: 1,
				totalImages: 0,
				currentPage: 1,
			};
		},
		mounted() {
			this.photos(this.page)
		},
		methods: {
			paginate(array, page_size, page_number) {
				return array.slice(
					(page_number - 1) * page_size,
					page_number * page_size
				);
			},
			photos(page){
				axios
					.get(window.location.origin + '/frontpage-api/gallery-api')
					.then((res) => {
						this.imgs = this.paginate(res.data, 8, page);
						this.totalImages = res.data.length;
					});
			},
			showImg(index) {
				this.indexRef = index;
				this.visibleRef = true;
			},
			onHide() {
				this.visibleRef = false;
			},
			onClickHandler(page) {
				this.currentPage = page;
				this.photos(page)
			},
		},
	};
</script>
