<template>
	<section
		class="about-us bg-slate-100 overflow-hidden lg:max-h-[700px] xs:max-h-[655px] md:max-h-[635px] max-h-[683px]">
		<div class="container">
			<div class="title py-8">
				<h2 class="text-2xl lg:text-4xl text-gray-800 font-bold">
					{{ items.title }}
				</h2>
				<p>
					{{ items.desc }}
				</p>
			</div>
		</div>
		<Splide
			:options="options"
			aria-label="earth slider"
			class="w-full lg:w-4/6 mx-auto earth-slider">
			<SplideSlide
				v-for="slide in items.items"
				:key="slide">
				<div class="text-center capitalize piller">
					<h4>{{ slide.text }}</h4>
					<h4 class="mb-2">{{ slide.number }}</h4>
				</div>
			</SplideSlide>
		</Splide>
		<div class="earth"></div>
	</section>
</template>

<style lang="scss" scoped>
	.piller {
		&::after {
			content: '';
			@apply mx-auto mt-4 rounded bg-gray-800 block w-1 h-26 lg:h-51;
		}

		&::before {
			content: '';
			@apply h-5 w-5 rounded-full block bg-red-600 mx-auto relative top-[70px];
		}
	}

	div.earth-slider {
		@apply transition-all;
		ul li {
			@apply transition-all;
			&:nth-child(even):not(.is-active) {
				@apply lg:mt-8;
			}
			&:nth-child(odd):not(.is-active) {
				@apply lg:mt-16;
			}
		}
	}

	.title {
		@apply text-center;

		h2 {
			@apply pb-4;
		}

		p {
			@apply pb-8 xl:w-10/12 mx-auto text-gray-400;
		}
	}
	.earth {
		background-image: url('../../images/contents/earth.png');

		@apply bg-top relative -top-8 lg:-top-28 lg:h-[300px] sm:h-[150px] xs:h-[125px] h-20;
		z-index: 9;
		background-size: 100% 100%;
		-webkit-mask-image: linear-gradient(
			rgba(255, 255, 255, 1) 0%,
			rgba(255, 255, 255, 1) 35%,
			rgba(255, 255, 255, 0) 100%
		);
	}
</style>

<script>
	export default {
		data() {
			return {
				items: {},
			};
		},
		mounted() {
			axios
				.get(window.location.origin + '/frontpage-api/about-us-api')
				.then((response) => {
					this.items = response.data;
				});
		},
		setup() {
			const options = {
				// clones: 4,
				// cloneStatus: false,
				autoplay: false,
				perPage: 5,
				perMove: 1,
				pagination: false,
				arrows: false,
				type: 'loop',
				focus: 'center',
				drag: false,
				breakpoints: {
					1024: {
						perPage: 1,
						drag: true,
						arrows: true,
					},
				},
			};

			return { options };
		},
	};
</script>
