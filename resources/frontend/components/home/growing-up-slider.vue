<template>
	<section class="py-16 overflow-hidden">
		<div class="flex flex-col items-center">
			<div class="content w-full mb-6">
				<h2 class="heading uppercase">48 years of growing up</h2>
			</div>
			<div class="growing-slider w-full">
				<Splide
					:options="options"
					@splide:pagination:mounted="onPaginationMounted"
					aria-label="growingSlider">
					<SplideSlide
						v-for="item in growingUpSlider"
						:key="item.largeImageURL"
						class="flex justify-around items-center transition-all overflow-hidden p-4">
						<div class="growing-up-slider relative w-full">
							<img
								:src="item.largeImageURL"
								:alt="item.user" />
							<div class="company-name absolute bottom-28 w-full">
								<h3
									class="text-white border-b-2 border-white w-fit mx-auto font-bold uppercase">
									{{ item.user }}
								</h3>
							</div>
						</div>
					</SplideSlide>
				</Splide>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '@splidejs/vue-splide/css/core';
	.growing-slider {
		li.splide__slide {
			@apply p-0;
		}
		.splide__arrow {
			@apply bg-transparent #{!important};
			path {
				fill: white;
			}
		}
		.splide__arrow.splide__arrow--prev {
			left: 16em;
			top: 35.68rem;
		}
		.splide__arrow.splide__arrow--next {
			right: 16em;
			top: 35.68rem;
		}
		ul.splide__pagination {
			@apply mb-12 w-fit mx-auto h-12 items-center;
			li {
				@apply mr-5;
				.custom-button {
					@apply flex justify-center mx-auto;
				}
				span {
					@apply mt-2 block text-white;
				}
				&:last-child {
					@apply mr-0 text-red-500;
				}
			}
		}
		.growing-up-slider {
			@apply w-full h-screen md:h-112;
			img {
				@apply w-full h-full object-cover;
			}
		}
	}
</style>

<script>
	import { Splide, SplideSlide } from '@splidejs/vue-splide';
	export default {
		components: {
			Splide,
			SplideSlide,
		},
		data() {
			return {
				growingUpSlider: [],
			};
		},
		async mounted() {
			try {
				const response = await axios.get('../../faker/images.json');
				this.growingUpSlider = await response.data.hits;
			} catch {}
		},
		methods: {
			onPaginationMounted(_, data) {
				this.growingUpSlider.forEach((item, index) => {
					const el = data.items[index];
					el.button.classList.add('custom-button');
					const span = document.createElement('span');
					span.textContent = item.user;
					el.li.appendChild(span);
				});
			},
		},

		setup() {
			// const

			const options = {
				autoplay: false,
				rewind: true,
				perPage: 1,
				perMove: 1,
				pagination: true,
				arrows: true,
				type: 'fade',
				interval: 3000,
				pagination: true,
			};

			return { options };
		},
	};
</script>
