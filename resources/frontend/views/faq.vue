<template>
	<p class="container">
		Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non soluta sed
		repellat fuga, alias mollitia commodi recusandae blanditiis nam quas
		reprehenderit aliquam asperiores iure, minus, enim eum velit numquam
		corporis! Nobis natus dolore optio accusantium nisi deleniti? Sed
		delectus, aliquid molestias excepturi saepe expedita et. Dolorum tempora
		sequi quae adipisci! Lorem ipsum dolor, sit amet consectetur adipisicing
		elit. Voluptatum possimus ea ratione minus eaque nemo non rerum modi
		nobis, atque earum, quae culpa quia impedit quis? Exercitationem quae
		commodi illo aliquam. Placeat assumenda eum deleniti quo unde! Eum fugit
		commodi sit libero, delectus voluptas reprehenderit impedit mollitia,
		esse, itaque numquam!
	</p>
	<section class="overflow-hidden py-8">
		<div class="zigzag_bg">
			<div>
				<Splide
					:options="options4"
					@splide:pagination:mounted="onPaginationMounted"
					aria-label="g">
					<SplideSlide
						v-for="(item, index) in growingUpSlider"
						:key="index"
						class="
							flex
							justify-around
							items-center
							transition-all
							overflow-hidden
							p-4
						">
						<div class="growing-up-slider relative w-full">
							<img
								src="https://beta.jamunagroup.com.bd/images/videos/1667305046-sfV5OwTjSu-company-slider-video.jpg"
								alt=""
								class="w-full object-cover h-[90vh]" />
							<div
								class="
									company-name
									absolute
									bottom-28
									w-full
									md:w-1/2
									z-0
									right-0
									top-0
									h-full
								">
								<div class="description">
									<h3
										class="
											text-lg
											md:text-3xl
											text-white
											w-fit
											uppercase
											text-year
											italic
											font-bold
										">
										{{ item.desc }}
									</h3>
									<h3
										class="
											text-lg
											md:text-3xl
											text-white
											w-fit
											uppercase
											text-title
											font-bold
										">
										{{ item.heading }}
									</h3>
								</div>
							</div>
						</div>
					</SplideSlide>
				</Splide>
			</div>
		</div>
	</section>
	<p class="container">
		Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non soluta sed
		repellat fuga, alias mollitia commodi recusandae blanditiis nam quas
		reprehenderit aliquam asperiores iure, minus, enim eum velit numquam
		corporis! Nobis natus dolore optio accusantium nisi deleniti? Sed
		delectus, aliquid molestias excepturi saepe expedita et. Dolorum tempora
		sequi quae adipisci! Lorem ipsum dolor, sit amet consectetur adipisicing
		elit. Voluptatum possimus ea ratione minus eaque nemo non rerum modi
		nobis, atque earum, quae culpa quia impedit quis? Exercitationem quae
		commodi illo aliquam. Placeat assumenda eum deleniti quo unde! Eum fugit
		commodi sit libero, delectus voluptas reprehenderit impedit mollitia,
		esse, itaque numquam!
	</p>
	<!-- <section class="overflow-hidden">
		<div class="flex flex-col items-center">
			<div class="content w-full mb-6">
				<h2 class="heading uppercase">48 years of growing up</h2>
			</div>
			<div class="growing-slider w-full">
				<Splide
					:options="options4"
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
	</section> -->
</template>

<script>
export default {
	data() {
		return { growingUpSlider: [] };
	},
	methods: {
		onPaginationMounted(_, data) {
			this.growingUpSlider.forEach((item, index) => {
				const el = data.items[index];
				el.button.classList.add('custom-button');
				// const span = document.createElement('span');
				el.button.classList.contains('is-active')
					? el.li.classList.add('is-active')
					: null;
				// dynamic years
				// span.textContent = item.desc;
				// static years
				// span.textContent = 2020 + index;
				// el.li.appendChild(span);
				el.button.textContent = item.desc;
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
	mounted() {
		axios
			.get(window.location.origin + '/frontpage-api/slider-bottom')
			.then((response) => {
				this.growingUpSlider = response.data;
			});
	},
	setup() {
		const options4 = {
			autoplay: false,
			rewind: true,
			direction: 'ttb',
			height: '32rem',
			breakpoints: {
				// 768: {
				// 	height: '320px',
				// },
				480: {
					direction: 'ltr',
					height: '200px',
				},
			},
		};
		return {
			options4,
		};
	},
};
</script>

<style lang="scss">
.zigzag_bg::after {
	@apply absolute -bottom-32 md:-bottom-52 lg:-bottom-52 xl:-bottom-24 xxl:-bottom-28 2xl:bottom-0 3xl:bottom-32 left-0 h-[100px] lg:h-[180px] w-full z-0 bg-no-repeat sm:bg-custom bg-custom-xs bg-right;
	// content: '';
	background-image: url(/frontend/images/logo/wave.png);
}

.splide__slide {
	@apply p-0 #{!important};
}
.splide__pagination.splide__pagination--ltr {
	@apply hidden;
}
ul.splide__pagination.splide__pagination--ttb {
	@apply lg:right-60 md:right-28 #{!important};
}
.splide__pagination::before {
	content: '';
	@apply bg-white h-[100%] absolute top-0 right-[2.333rem] opacity-50;
	width: 1px;
}
.splide__pagination__page.is-active,
.splide__pagination__page {
	@apply bg-transparent text-white opacity-100 italic relative scale-100 #{!important};
	&.is-active {
		@apply text-red-600 opacity-100 #{!important};
	}
}

.splide__pagination__page::before {
	content: '';
	@apply bg-white absolute right-8 -bottom-[6px] rounded-full;
}
.splide__pagination__page.is-active::before {
	width: 5px;
	height: 5px;
}
// .splide__pagination {
// 	@apply right-60 #{!important};
// }

.splide__arrow {
	@apply bg-transparent opacity-100 #{!important};
	svg {
		fill: white;
	}
}
.splide__arrows.splide__arrows--ttb {
	@apply h-4/5 absolute top-8 left-[44rem]  md:left-[36rem] lg:left-[44rem] xl:left-[60rem] xxl:left-[68rem] 2xl:left-[74rem] 3xl:left-[98rem];
}
// .splide__arrows {
// 	@apply relative;
// 	.splide__arrow--prev {
// 		@apply left-0 lg:left-[44rem] xxl:left-[68rem] 2xl:left-[75rem] 3xl:left-[100rem] top-24;
// 	}
// 	.splide__arrow--next {
// 		@apply xl:-bottom-100 lg:-bottom-[25rem] left-[23rem] lg:left-[44rem] xxl:left-[68rem] 2xl:left-[75rem] 3xl:left-[100rem];
// 	}
// }
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
@import '../assets/scss/variables/growing-up-slider';
</style>