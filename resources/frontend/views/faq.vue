<template>
	<p class="container">
		Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non soluta sed
		repellat fuga, alias mollitia commodi recusandae blanditiis nam quas
		reprehenderit aliquam asperiores iure, minus, enim eum velit numquam
		corporis! Nobis natus dolore optio accusantium nisi deleniti? Sed
		delectus, aliquid molestias excepturi saepe expedita et. Dolorum tempora
		sequi quae adipisci!
	</p>
	<section class="overflow-hidden">
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
	// updated() {
	// 	document
	// 		.querySelectorAll('.splide__pagination__page')
	// 		.forEach((item) => {
	// 			// item.textContent = 'anik';
	// 			console.log(item);
	// 		});
	// },
	setup() {
		const options4 = {
			// autoplay: false,
			// perMove: 1,
			// rewind: true,
			// perPage: 1,
			// perMove: 1,
			// pagination: true,
			// arrows: true,
			// type: 'fade',
			// interval: 2000,
			// pagination: true,
			direction: 'ttb',
			height: '32rem',
		};
		return {
			options4,
		};
	},
};
</script>

<style lang="scss">
.zigzag_bg::after {
	@apply absolute -bottom-4 lg:-bottom-16 left-0 h-[100px] lg:h-[180px] w-full z-0 bg-no-repeat sm:bg-custom bg-custom-xs bg-right;
	content: '';
	background-image: url(/frontend/images/logo/wave.png);
}

.splide__pagination::before {
	content: '';
	@apply bg-white h-[100%] absolute top-0 right-[3.333rem];
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
	@apply bg-white absolute right-12 bottom-0 rounded-full;
}
.splide__pagination__page.is-active::before {
	width: 5px;
	height: 5px;
}
.splide__pagination {
	@apply right-60 #{!important};
}

.splide__arrow {
	@apply bg-transparent #{!important};
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
@import '../assets/scss/variables/growing-up-slider';
</style>