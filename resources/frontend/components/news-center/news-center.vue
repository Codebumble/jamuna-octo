<template>
	<section class="pb-16 angled upper-end">
		<div class="container">
			<div class="grid lg:grid-cols-3 gap-4">
				<div
					class="shadow hover:shadow-md transition-all"
					v-for="(event, key) in visibleEvents"
					:key="key">
					<img
						:src="event.imgSrc"
						:alt="event.alt"
						class="w-full rounded-bl-none rounded-br-none rounded-tr rounded-tl min-h-[200px] max-h-[200px] object-cover pt-0 bg-slate-50" />
					<div
						class="p-4 pb-6 rounded-tl-none rounded-tr-none rounded-bl rounded-br backdrop-blur-md min-h-[260px] lg:min-h-[230px] max-h-[260px] lg:max-h-[230px] overflow-hidden">
						<router-link to="">
							<h4
								class="text-xl font-bold text-gray-800 mt-4 mb-2">
								{{ event.eventTitle.substring(0, 37) + '...' }}
							</h4>
						</router-link>
						<p class="text-base text-gray-400 pb-2">
							{{ event.eventExerp.substring(0, 150) + ' ...' }}
						</p>
					</div>
				</div>
			</div>
			<button
				class="loadMore mt-8"
				@click="eventVisible += step"
				v-if="eventVisible < events.length">
				Load more...
			</button>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_group-company';

	.loadMore {
		@apply block mx-auto py-3 px-4 border border-slate-300 hover:bg-red-600 transition-all hover:text-white rounded-md;
	}
</style>

<script>
	export default {
		name: 'news center',
		data() {
			return {
				eventVisible: 3,
				step: 3,
				events: [
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
		computed: {
			visibleEvents() {
				return this.events.slice(0, this.eventVisible);
			},
		},
	};
</script>
