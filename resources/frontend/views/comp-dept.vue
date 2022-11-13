<template>
	<section id="cb-bg-video" class="overflow-hidden cb-hero relative">
		<div class="zigzag_bg">
			<div class="flex justify-start items-center">
				<div class="image">
					<img
						:src="breadcumb.featured_image"
						:alt="breadcumb.label"
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
								{{ breadcumb.label }}
							</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="image-gallery pb-16 pt-8 md:pt-16 lg:pt-32">
		<div class="w-3/4 mx-auto">
			<div
				class="
					grid grid-cols-1
					lg:grid-cols-2
					md:grid-cols-2
					gap-6
					pb-8
				">
				<div
					v-for="(item, index) in companies"
					:key="index"
					class="image">
					<router-link :to="item.route">
						<div class="thumbnail">
							<img :src="item.image" :alt="item.title" />
							<div class="title">
								<h3>{{ item.label }}</h3>
							</div>
						</div>
					</router-link>
				</div>
			</div>
		</div>
	</div>
</template>

<style lang="scss">
@import '../assets/scss/variables/_hero.scss';
@import '../assets/scss/variables/_companies-gallery.scss';
</style>

<script>
export default {
	data() {
		return {
			breadcumb: {
				featured_image: '',
				label: '',
			},
			companies: [],
		};
	},
	methods: {
		switcher(id) {
			if (id) {
				axios
					.get(window.location.origin + '/frontpage-api/nav-company')
					.then((response) => {
						this.companies = response.data.company[id].childSubmenu;
						this.breadcumb = {
							featured_image:
								response.data.company[id].featured_image,
							label: response.data.company[id].label,
						};
						document.title = `${response.data.company[id].label} | Jamuna Group`;
					});
			}
		},
	},
	mounted() {
		this.switcher(this.$route.params.id);
		this.$watch(
			() => this.$route.params,
			(toParams, PreviousParams) => {
				this.switcher(this.$route.params.id);
			}
		);
	},
	setup() {
		const options = {
			autoplay: true,
			rewind: true,
			perPage: 1,
			perMove: 1,
			pagination: true,
			arrows: true,
			type: 'fade',
			interval: 3000,
			pagination: false,
		};
		return {
			options,
		};
	},
};
</script>
