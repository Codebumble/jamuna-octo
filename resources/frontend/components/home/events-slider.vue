<template>
	<section class="group-company">
		<div class="lg:container px-2 lg:px-0">
			<div class="title">
				<h2 class="text-2xl lg:text-4xl text-gray-800 font-bold">
					{{ groupTitle.title }}
				</h2>
				<p v-if="groupTitle.descVisibility == true">
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
							class="p-4 pb-6 rounded-tl-none rounded-tr-none rounded-bl rounded-br backdrop-blur-md min-h-[180px] max-h-[180px] overflow-hidden">
							<!-- <span class="itemName">{{ slide.title }}</span> -->

							<router-link
								:to="'/event-details/' + slide.webLink">
								<h4
									class="text-xl font-bold text-gray-800 mt-4 mb-2">
									{{
										slide.eventTitle.substring(0, 50) +
										'...'
									}}
								</h4>
							</router-link>
							<p class="text-base text-gray-400 pb-2">
								{{ slide.eventExerp.substring(0, 80) + ' ...' }}
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
					title: '',
					descVisibility: '',
					description: '',
				},
				slideContent: [],
			};
		},
		components: {
			Splide,
			SplideSlide,
		},
		created() {
			axios
				.get(window.location.origin + '/frontpage-api/event-list')
				.then((response) => {
					response.data.forEach((item) => {
						this.slideContent.push({
							imgSrc: item.image,
							alt: '',
							webLink: item.id,
							eventTitle: item.name,
							eventExerp: item.detail,
						});
					});
				});
			axios
				.get(window.location.origin + '/frontpage-api/event-header')
				.then((response) => {
					this.groupTitle.title = response.data.title;
					this.groupTitle.descVisibility =
						response.data.descVisibility;
					this.groupTitle.description = response.data.description;
				});
		},
		setup() {
			const groupsoptions = {
				rewind: false,
				rewindByDrag: false,
				trimSpace: true,
				arrows: true,
				autoplay: true,
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
