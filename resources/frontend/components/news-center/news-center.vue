<template>
	<section class="pb-16 pt-32">
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
						class="p-4 pb-6 rounded-tl-none rounded-tr-none rounded-bl rounded-br backdrop-blur-md min-h-[180px] max-h-[180px] overflow-hidden">
						<router-link :to="'/event-details/'+event.webLink">
							<h4
								class="text-xl font-bold text-gray-800 mt-4 mb-2">
								{{ event.eventTitle.substring(0, 37) + '...' }}
							</h4>
						</router-link>
						<p class="text-base text-gray-400 pb-2">
							{{ event.eventExerp.substring(0, 80) + ' ...' }}
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
				events: [],
			};
		},
		created() {
			axios
			.get(window.location.origin + '/frontpage-api/event-list')
			.then((response) => {
				response.data.forEach(item=>{
					this.events.push({
						imgSrc: item.image,
						alt: item.name,
						webLink: item.id,
						eventTitle: item.name,
						eventExerp: item.detail,
					})
				})
			});
		},
		computed: {
			visibleEvents() {
				return this.events.slice(0, this.eventVisible);
			},
		},
	};
</script>
