<template>
	<section id="cb-bg-video" class="overflow-hidden cb-hero relative">
		<div class="zigzag_bg">
			<div class="flex justify-start items-center">
				<div class="image">
					<img
						:src="breadcumb.src"
						:alt="breadcumb.title"
						class="w-full object-cover h-[90vh]" />
				</div>
				<div class="absolute w-full">
					<div class="container flex flex-col">
						<div class="overflow-hidden">
							<h1
								class="
									ml-8
									2xl:ml-8
									xl:ml-0
									text-2xl
									lg:text-[36px]
									text-white
									font-bold
									capitalize
									leading-snug
									w-[80%]
									lg:w-[50%]
									text-shadow-extreme
								">
								{{ breadcumb.title }}
							</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="contact pb-8 pt-16">
		<div class="container pb-8">
			<div class="main-content">
				<div class="mb-4" v-html="contents.text"></div>
				<div class="image-gallery pb-16 pt-8">
					<div
						class="
							grid grid-cols-1
							lg:grid-cols-4
							md:grid-cols-2
							gap-5
							pb-8
						">
						<div
							v-for="(item, index) in visibleImages"
							:key="index"
							@click="() => showImg(index)"
							class="image">
							<div class="thumbnail">
								<img
									:src="item.src"
									:alt="`${breadcumb.title} ${index + 1}`" />
							</div>
						</div>
					</div>
					<div>
						<vue-awesome-paginate
							:total-items="totalImages"
							:items-per-page="12"
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
							:imgs="contents.images"
							:index="indexRef"
							@hide="onHide"></vue-easy-lightbox>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
import VueEasyLightbox from 'vue-easy-lightbox';
export default {
	components: {
		VueEasyLightbox,
	},
	computed: {
		visibleImages() {
			return this.contents.images.slice(0, this.images);
		},
	},
	data() {
		return {
			breadcumb: {
				src: '',
				title: '',
			},
			contents: {
				text: '',
				images: [],
			},
			visibleRef: false,
			indexRef: 0,
			page: 1,
			currentPage: 1,
			totalImages: 0,
		};
	},
	methods: {
		paginate(array, page_size, page_number) {
			return array.slice(
				(page_number - 1) * page_size,
				page_number * page_size
			);
		},
		photos(page) {
			axios
				.get(
					window.location.origin +
						'/frontpage-api/future-expansion-single-data/' +
						this.$route.params.id
				)
				.then((res) => {
					this.contents.text = res.data.desc_data;
					this.breadcumb.src = res.data.image;
					this.breadcumb.title = res.data.name;
					this.contents.images = this.paginate(JSON.parse(res.data.json_data).images, 12, page);
					this.totalImages = JSON.parse(res.data.json_data).length;
					document.title = `${res.data.name} | Jamuna Group`;
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
			this.photos(page);
		},
	},
	mounted() {
		this.photos(this.page);
	},
};
</script>

<style lang="scss">
@import '../assets/scss/variables/_hero.scss';
@import '../assets/scss/variables/image-gallery';
@import '../assets/scss/variables/pagination';
</style>
