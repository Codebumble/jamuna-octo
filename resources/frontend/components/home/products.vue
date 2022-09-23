<template>
	<section class="group-company bg-slate-100">
		<div class="container">
			<div class="title">
				<h2 class="text-2xl lg:text-4xl text-gray-800 font-bold">
					{{ groupTitle.title }}
				</h2>
				<p v-if="groupTitle.descVisibility == 'true'">
					{{ groupTitle.description }}
				</p>
			</div>
			<div class="company-slide">
				<Splide
					:options="groupsoptions"
					aria-label="group-companies">
					<SplideSlide
						class="slideItem px-2 lg:px-4"
						v-for="(slide, key) in slideContent"
						:key="key">
						<div
							class="p-4 pb-6 rounded hover:backdrop-blur-md min-h-[300px] max-h-[300px]">
							<img
								:src="slide.imgSrc"
								:alt="slide.alt"
								class="w-full rounded min-h-[200px] max-h-[200px] object-cover pt-0 bg-slate-50" />

							<!-- <span class="itemName">{{ slide.title }}</span> -->
							<router-link
								:to="slide.webLink"
								class="button block mx-auto mt-3"
								>{{ slide.linkText }}</router-link
							>
						</div>
					</SplideSlide>
				</Splide>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_group-company';
</style>

<script>
	export default {
		data() {
			return {
				groupTitle: {
					title: '',
					descVisibility: '',
					description: '',
				},
				slideContent: [],
			};
		},
		mounted() {
			axios
				.get(window.location.origin + '/frontpage-api/all-product-view')
				.then((response) => {
					this.slideContent = response.data;
				});
			axios
				.get(window.location.origin + '/frontpage-api/product-header')
				.then((response) => {
					this.groupTitle.title = response.data.title;
					this.groupTitle.descVisibility =
						response.data.descVisibility;
					this.groupTitle.description = response.data.description;
				});
		},
		setup() {
			const groupsoptions = {
				trimSpace: true,
				arrows: true,
				autoplay: true,
				interval: 3000,
				perPage: 4,
				type: 'loop',
				perMove: 2,
				drag: true,
				breakpoints: {
					1024: {
						perPage: 2,
						perMove: 1,
					},
					640: {
						perPage: 1,
						perMove: 1,
					},
				},
			};

			return { groupsoptions };
		},
	};
</script>
