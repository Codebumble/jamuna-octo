<template>
	<section
		id="cb-bg-video"
		class="overflow-hidden cb-hero relative">
		<div class="">
			<Splide
				:options="options"
				aria-label="Hero Slider"
				class="">
				<SplideSlide
					v-for="slide in sliderContents"
					class="flex justify-start items-center">
					<div :class="slide.overlay ? 'image' : 'w-full'">
						<img
							:src="slide.src"
							:alt="slide.alt"
							class="w-full object-cover h-77vh" />
					</div>
					<div class="absolute w-full z-20">
						<div class="container flex flex-col">
							<div class="overflow-hidden">
								<h1
									class="text-3xl lg:text-[40px] text-white font-bold capitalize leading-snug w-[55%] lg:w-full">
									{{ slide.heading }}
								</h1>
								<p
									v-if="slide.showDescription"
									class="text-white capitalize text-lg mt-2">
									{{ slide.description }}
								</p>
							</div>
							<a
								v-if="slide.showButton"
								:href="slide.link"
								:class="{
									button: slide.button,
									'button-alt': slide.buttonAlt,
								}"
								class="mt-4 capitalize font-bold">
								{{ slide.buttonText }}
							</a>
						</div>
					</div>
				</SplideSlide>
			</Splide>
		</div>
	</section>
</template>

<style lang="scss">
	@import '@splidejs/vue-splide/css';
	@import '../../assets/scss/variables/_hero.scss';

	.splide__pagination__page {
		background: #fff;
		border: 0;
		border-radius: 50%;
		display: inline-block;
		height: 6px;
		margin: 5px;
		opacity: 1;
		padding: 0;
		position: relative;
		// /transition: transform 0.2s linear;
		width: 6px;
	}

	.splide__pagination__page.is-active {
		//transform: scale(1.4);
		z-index: 20;
		width: 12px;
		height: 6px;
		border-radius: 50px;
		@apply bg-rose-600 #{!important};
	}

	.splide__pagination li {
		@apply flex items-center #{!important};
	}
</style>

<script>
	import { Splide, SplideSlide } from '@splidejs/vue-splide';
	export default {
		data() {
			return {
				sliderContents: [],
			};
		},
		components: {
			Splide,
			SplideSlide,
		},
		mounted(){
			axios
      		.get(window.location.origin+'/frontpage-api/slider')
      		.then(response => {
				this.sliderContents = response.data;
				});
		},
		setup() {
			const options = {
				rewind: false,
				arrows: false,
				autoplay: false,
				perPage: 1,
				type: 'loop',
				perMove: 1,
				drag: true,
				pauseOnHover: true,
				cloneStatus: false,
				autoHeight: true,
			};


			return { options };
		},
	};
</script>
