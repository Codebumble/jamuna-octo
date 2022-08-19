<template>
	<section class="group-company bg-slate-50">
		<div class="container">
			<div class="title">
				<h2 class="text-2xl lg:text-4xl text-gray-800 font-bold">
					{{ groupTitle.title }}
				</h2>
				<p v-if="groupTitle.descVisibility">
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
							class="p-4 pb-6 rounded-xl backdrop-blur-md min-h-[413px] max-h-[413px]">
							<img
								:src="slide.imgSrc"
								:alt="slide.alt"
								class="w-full rounded-xl min-h-[295px] max-h-[295px] object-contain p-6 pt-0" />

							<span class="itemName">{{ slide.title }}</span>
							<a
								:href="slide.webLink"
								class="button block mx-auto"
								>{{ slide.linkText }}</a
							>
						</div>
					</SplideSlide>
				</Splide>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '@splidejs/vue-splide/css';
	@import '../../assets/scss/variables/_group-company';
</style>

<script>
	import { Splide, SplideSlide } from '@splidejs/vue-splide';
	export default {
		data() {
			return {
				groupTitle: {},
				slideContent: [],
			};
		},
		components: {
			Splide,
			SplideSlide,
		},
		mounted() {
			axios
				.get(window.location.origin + '/frontpage-api/all-company-view')
				.then((response) => {
					this.slideContent = response.data.images;
					this.groupTitle = response.data.galary_data;
				});
		},
		setup() {
			const groupsoptions = {
				rewind: false,
				rewindByDrag: false,
				trimSpace: true,
				arrows: true,
				autoplay: false,
				interval: 3000,
				perPage: 4,
				type: 'loop',
				perMove: 4,
				drag: true,
				pauseOnHover: true,
				cloneStatus: true,
				// gap: '2rem',
				// fixedWidth: '300px',
				// focus: 'center',
				breakpoints: {
					1024: {
						// fixedWidth: '270.5px',
						perPage: 1,
						perMove: 1,
					},
				},
			};

			return { groupsoptions };
		},
	};
</script>
