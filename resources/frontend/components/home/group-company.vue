<template>
	<section class="group-company">
		<div class="container">
			<div class="title">
				<h2 class="text-4xl text-gray-800 font-bold">
					{{ groupTitle.title }}
				</h2>
				<p v-if="groupTitle.descVisibility">
					{{ groupTitle.description }}
				</p>
			</div>
		</div>
		<div class="company-slide">
			<Splide
				:options="groupsoptions"
				aria-label="group-companies">
				<SplideSlide
					class="slideItem"
					v-for="slide in slideContent">
					<div class="p-4 pb-6 rounded-xl backdrop-blur-md">
						<img
							:src="slide.imgSrc"
							:alt="slide.alt"
							class="w-full rounded-xl max-h-[248.5px] lg:max-h-[327.5px] object-contain" />

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
				autoplay: true,
				perPage: 2,
				type: 'loop',
				perMove: 1,
				drag: true,
				pauseOnHover: true,
				cloneStatus: true,
				gap: '2rem',
				fixedWidth: '359.5px',
				focus: 'center',
				breakpoints: {
					1024: {
						fixedWidth: '280.5px',
						perPage: 1,
					},
				},
			};

			return { groupsoptions };
		},
	};
</script>
