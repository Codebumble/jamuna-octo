<template>
	<section class="overflow-hidden">
		<div>
			<div class="grid grid-cols-4 gap-4 lg:h-[600px]">
				<div class="col-span-4 lg:col-span-3">
					<Splide
						:options="preview"
						aria-label="preview"
						ref="main">
						<SplideSlide
							v-for="previews in slider"
							:key="previews"
							class="flex justify-start items-center"
							ref="main">
							<div class="w-full">
								<img
									:src="previews.src"
									:alt="previews.heading"
									class="object-cover w-full h-[34.4rem] rounded" />
							</div>
							<div
								class="absolute w-full z-20 flex self-end mb-40">
								<div class="container">
									<p
										class="ml-12 text-xl font-bold text-white text-shadow-extreme">
										{{ previews.heading }}
									</p>
								</div>
							</div>
						</SplideSlide>
					</Splide>
				</div>
				<div class="thumbnails col-span-4 lg:col-span-1">
					<Splide
						:options="thumbnails"
						aria-label="thumbnails"
						ref="thumbs">
						<SplideSlide
							v-for="thumbs in slider"
							:key="thumbs">
							<div class="bg-slate-200 overflow-hidden rounded">
								<img
									:src="thumbs.src"
									:alt="thumbs.heading"
									class="object-cover !h-[102px]" />
								<p class="text-center capitalize">
									{{ thumbs.heading }}
								</p>
							</div>
						</SplideSlide>
					</Splide>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '@splidejs/vue-splide/css/core';
	@import '../../assets/scss/variables/ind-slider';
</style>

<script>
	import { Splide, SplideSlide } from '@splidejs/vue-splide';
	import { ref, onMounted } from 'vue';
	export default {
		components: {
			Splide,
			SplideSlide,
		},
		data() {
			return {
				slider: [],
			};
		},
		mounted() {
			axios
				.get(window.location.origin + '/frontpage-api/slider')
				.then((response) => {
					this.slider = response.data;
					console.log(this.slider);
				});
		},
		setup() {
			const main = ref();
			const thumbs = ref();
			const thumbnails = {
				autoplay: false,
				isNavigation: true,
				focus: 'center',
				// fixedWidth: 246,
				// fixedHeight: 102,
				width: '100%',
				height: '100%',
				perPage: 4,
				gap: 10,
				rewind: true,
				pagination: false,
				arrows: true,
				direction: 'ttb',
				updateOnMove: true,
				breakpoints: {
					1023: {
						direction: 'ltr',
						perPage: 3,
					},
					640: {
						perPage: 2,
					},
				},
			};
			const preview = {
				rewind: true,
				pagination: false,
				type: 'fade',
				autoplay: false,
				interval: 2000,
			};

			onMounted(() => {
				if (thumbs.value?.splide) {
					main.value?.sync(thumbs.value?.splide);
				}
			});

			return { thumbnails, preview, main, thumbs };
		},
	};
</script>
