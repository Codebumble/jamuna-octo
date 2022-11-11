<template>
	<section
		id="cb-bg-video"
		class="overflow-hidden cb-hero relative">
		<div class="zigzag_bg">
			<Splide
				:options="options"
				aria-label="header slider">
				<SplideSlide
					v-for="(slide, item) in sliderContents"
					:key="item"
					class="flex justify-start items-center">
					<div class="image">
						<img
							v-if="
								/(\.jpg|\.jpeg|\.png|\.gif)$/i.exec(slide.src)
							"
							:src="slide.src"
							alt=""
							class="w-full object-cover h-[90vh]" />
						<video
							v-else
							class="w-full object-cover h-[90vh]"
							autoplay
							muted
							loop>
							<source
								:src="slide.src"
								type="video/mp4" />
							Your browser does not support the video tag.
						</video>
					</div>
					<div class="absolute w-full z-20">
						<div class="container flex flex-col">
							<div class="overflow-hidden">
								<h1
									class="ml-8 2xl:ml-8 xl:ml-0 text-2xl lg:text-[36px] text-white font-bold capitalize leading-snug w-[80%] lg:w-[50%] text-shadow-extreme">
									{{ slide.heading }}
								</h1>
							</div>
						</div>
					</div>
				</SplideSlide>
			</Splide>
		</div>
	</section>
	<div class="image-gallery pb-16 pt-8 md:pt-16 lg:pt-32">
		<div class="w-3/4 mx-auto">
			<div
				class="grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 gap-6 pb-8">
				<div
					v-for="(item, index) in companies"
					:key="index"
					class="image">
					<router-link :to="item.link">
						<div class="thumbnail">
							<img
								:src="item.src"
								:alt="item.title" />
							<div class="title">
								<h3>{{ item.title }}</h3>
							</div>
						</div>
					</router-link>
				</div>
			</div>
		</div>
	</div>
</template>

<style lang="scss">
	@import '../assets/scss/variables/_hero.scss';
	@import '../assets/scss/variables/_companies-gallery.scss';
</style>

<script>
	export default {
		data() {
			return {
				sliderContents: [],
				companies: [
					{
						src: 'https://beta.jamunagroup.com.bd/images/company-gallery/1662995804-010-company-images.jpg',
						title: 'hoorain limited',
						link: '/companies/28/HOOR',
					},
					{
						src: 'https://beta.jamunagroup.com.bd/images/company-gallery/1662995817-010-company-images.jpg',
						title: 'hoor',
						link: '/companies/28/HOOR',
					},
					{
						src: 'https://beta.jamunagroup.com.bd/images/company-gallery/1662995804-010-company-images.jpg',
						title: 'januma denims limited',
						link: '',
					},
					{
						src: 'https://beta.jamunagroup.com.bd/images/company-gallery/1662995817-010-company-images.jpg',
						title: 'jamuna spinning mill',
						link: '/companies/28/HOOR',
					},
				],
			};
		},
		mounted() {
			axios
				.get(window.location.origin + '/frontpage-api/video-slider')
				.then((response) => {
					this.sliderContents = response.data;
				});
			// axios
			// 	.get(window.location.origin + '/frontpage-api/nav-company')
			// 	.then((response) => {
			// 		this.companies = response.data.company;
			// 		var id= this.$route.params.id;
			// 		console.log(response.data.company[id]);

			// 	});
		},
		setup() {
			const options = {
				autoplay: true,
				rewind: true,
				perPage: 1,
				perMove: 1,
				pagination: true,
				arrows: true,
				type: 'fade',
				interval: 3000,
				pagination: false,
			};
			return {
				options,
			};
		},
	};
</script>
