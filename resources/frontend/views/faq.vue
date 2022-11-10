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
				el.button.classList.contains('is-active')
					? el.li.classList.add('is-active')
					: null;
				el.button.textContent = item.desc;
			});
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
@import '../assets/scss/variables/growing-up-slider';
</style>