<template>
	<section class="group-company">
		<div class="lg:container px-2 lg:px-0">
			<div class="title">
				<h2 class="text-2xl lg:text-4xl text-gray-800 font-bold">
					{{ groupTitle.title }}
				</h2>
				<p v-if="groupTitle.descVisibility">
					{{ groupTitle.description }}
				</p>
			</div>
			<div class="company-slide">
				<Splide
					:options="groupsoptions"
					aria-label="group-companies">
					<SplideSlide
						class="slideItem px-2 lg:px-4"
						v-for="(slide, key) in slideContent"
						:key="key">
						<img
							:src="slide.imgSrc"
							:alt="slide.alt"
							class="w-full rounded-bl-none rounded-br-none rounded-tr rounded-tl min-h-[200px] max-h-[200px] object-cover pt-0 bg-slate-50" />
						<div
							class="p-4 pb-6 rounded-tl-none rounded-tr-none rounded-bl rounded-br backdrop-blur-md min-h-[240px] max-h-[240px] overflow-hidden">
							<!-- <span class="itemName">{{ slide.title }}</span> -->

							<router-link to="/event-details/2">
								<h4
									class="text-xl font-bold text-gray-800 mt-4 mb-2">
									{{
										slide.eventTitle.substring(0, 50) +
										'...'
									}}
								</h4>
							</router-link>
							<p class="text-base text-gray-400 pb-2">
								{{
									slide.eventExerp.substring(0, 150) + ' ...'
								}}
							</p>
						</div>
					</SplideSlide>
				</Splide>
			</div>
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
				groupTitle: {
					title: 'Events',
					descVisibility: true,
					description:
						'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit dolorem, nemo maiores debitis quod distinctio repellendus. Dolore ipsam veritatis voluptas.',
				},
				slideContent: [
					{
						imgSrc: 'https://images.unsplash.com/photo-1518135714426-c18f5ffb6f4d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1496&q=80',
						alt: 'denims1',
						webLink: '/hoorain-htf',
						eventTitle: 'Jamuna group signs a new agreement',
						eventExerp:
							'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum totam, facilis sunt repellat rerum fugit. Magnam quod quis voluptates, porro, molestias quo laudantium perferendis possimus repellat iste placeat architecto nulla.',
					},
					{
						imgSrc: 'https://images.unsplash.com/photo-1549923746-c502d488b3ea?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80',
						alt: 'denims1',
						webLink: '/hoorain-htf',
						eventTitle: 'Jamuna invested 99 lacs BDT to a evaly',
						eventExerp:
							'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum totam, facilis sunt repellat rerum fugit. Magnam quod quis voluptates, porro, molestias quo laudantium perferendis possimus repellat iste placeat architecto nulla.',
					},
					{
						imgSrc: 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80',
						alt: 'denims1',
						webLink: '/hoorain-htf',
						eventTitle:
							'Jamuna arranged meeting to start new business',
						eventExerp:
							'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum totam, facilis sunt repellat rerum fugit. Magnam quod quis voluptates, porro, molestias quo laudantium perferendis possimus repellat iste placeat architecto nulla.',
					},
				],
			};
		},
		components: {
			Splide,
			SplideSlide,
		},
		mounted() {
			// axios
			// 	.get(window.location.origin + '/frontpage-api/all-company-view')
			// 	.then((response) => {
			// 		this.slideContent = response.data.images;
			// 		this.groupTitle = response.data.galary_data;
			// 	});
		},
		setup() {
			const groupsoptions = {
				rewind: false,
				rewindByDrag: false,
				trimSpace: true,
				arrows: true,
				autoplay: false,
				interval: 3000,
				perPage: 3,
				type: 'loop',
				perMove: 4,
				drag: true,
				pauseOnHover: true,
				cloneStatus: true,
				pagination: false,
				// gap: '2rem',
				// fixedWidth: '300px',
				// focus: 'center',
				breakpoints: {
					1024: {
						// fixedWidth: '270.5px',
						perPage: 1,
						perMove: 1,
					},
				},
			};

			return { groupsoptions };
		},
	};
</script>
