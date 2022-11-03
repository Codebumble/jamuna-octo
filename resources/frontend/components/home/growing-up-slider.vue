<template>
	<section class="overflow-hidden">
		<div class="flex flex-col items-center">
			<div class="content w-full mb-6">
				<h2 class="heading uppercase">48 years of growing up</h2>
			</div>
			<div class="growing-slider w-full">
				<Splide
					:options="options"
					@splide:pagination:mounted="onPaginationMounted"
					@splide:moved="onMoved"
					aria-label="growingSlider">
					<SplideSlide
						v-for="item in growingUpSlider"
						:key="item"
						class="
							flex
							justify-around
							items-center
							transition-all
							overflow-hidden
							p-4
						">
						<div class="growing-up-slider relative w-full">
							<img :src="item.src" :alt="item.heading" />
							<div
								class="
									company-name
									absolute
									bottom-28
									w-1/2
									z-0
									right-0
									top-0
									h-full
								">
								<h3
									class="
										text-lg
										md:text-3xl
										text-white
										w-fit
										uppercase
										text
										font-bold
									">
									{{ item.heading }}
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
.text {
	@apply mt-20 md:mt-40 ml-3 md:ml-auto mr-4 lg:mr-20 md:mr-12;
}
.company-name::before {
	content: '';
	@apply w-full h-full absolute -z-[1];
	background: rgb(110, 107, 107);
	background: linear-gradient(
		90deg,
		rgba(110, 107, 107, 0.13489145658263302) 9%,
		rgba(87, 85, 85, 0.3) 28%,
		rgba(66, 65, 65, 0.38) 45%,
		rgba(31, 31, 31, 0.45) 74%,
		rgba(0, 0, 0, 0.5) 100%
	);
}
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
		@apply left-16 2xl:left-80 xl:left-16 lg:left-96 md:left-64  top-[15.52rem] md:top-[27.52rem];
	}
	.splide__arrow.splide__arrow--next {
		@apply right-16 2xl:right-80 xl:right-16 lg:right-96 md:right-64 top-[15.52rem] md:top-[27.52rem];
	}
	ul.splide__pagination {
		@apply bg-white bg-opacity-25 mb-12 w-fit mx-auto h-12 items-center;
		li {
			@apply mr-5;
			.custom-button {
				@apply flex justify-center mx-auto;
			}
			span {
				@apply mt-2 block text-white;
			}
			&:not(.is-active) {
				@apply hidden xl:block;
			}
			&:last-child {
				@apply mr-0;
			}
			&.is-active {
				@apply xl:mr-5 mr-0 ml-4 xl:ml-0;
			}
		}
	}
	.growing-up-slider {
		@apply w-full h-80 md:h-104;
		img {
			@apply w-full h-full object-cover;
		}
	}
}
</style>

<script>
export default {
	data() {
		return {
			growingUpSlider: [],
		};
	},
	async mounted() {
		try {
			const response = await axios.get(
				window.location.origin + '/frontpage-api/slider-bottom'
			);
			this.growingUpSlider = await response.data;
		} catch {}
	},
	methods: {
		onPaginationMounted(_, data) {
			this.growingUpSlider.forEach((item, index) => {
				const el = data.items[index];
				el.button.classList.add('custom-button');
				const span = document.createElement('span');
				el.button.classList.contains('is-active')
					? el.li.classList.add('is-active')
					: null;
				// dynamic years
				span.textContent = item.desc;
				// static years
				// span.textContent = 2020 + index;
				el.li.appendChild(span);
			});
		},
		onMoved(_, prevIndex, dest) {
			const pagination = document.querySelectorAll(
				'.splide__pagination li'
			);
			if (prevIndex > dest) {
				pagination[prevIndex - 1].classList.remove('is-active');
				pagination[prevIndex].classList.add('is-active');
			} else {
				pagination[dest].classList.remove('is-active');
				pagination[prevIndex].classList.add('is-active');
			}
		},
	},

	setup() {
		const options = {
			autoplay: false,
			perMove: 1,
			rewind: true,
			perPage: 1,
			perMove: 1,
			pagination: true,
			arrows: true,
			type: 'fade',
			interval: 2000,
			pagination: true,
		};

		return { options };
	},
};
</script>
