<template>
	<section class="future-expansion pb-16">
		<div class="container">
			<div class="service-heading py-5">
				<h2 class="text-3xl lg:text-5xl font-bold">Road Map Brief</h2>
			</div>
			<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 py-8">
				<div
					class="card"
					id="ms"
					v-for="map in roadMaps">
					<div class="card-about">
						<h2>{{ map.name }}</h2>
					</div>
				</div>
			</div>
			<div class="road-map-description">
				<p>
					In spite of its successful ventures in numerous industrial
					and business sectors of the country, the Group does not
					believe in limiting its scope of business. Being one of the
					largest conglomerates in Bangladesh, Jamuna Group has a
					vision to make the country self sufficient both
					technologically and financially. This can only be achieved
					if the country can outsource all its requirements through
					the domestic sector lessening its dependence on foreign
					expertise and resources.
				</p>

				<p>
					This farsighted approach makes Jamuna Group to explore newer
					horizons and serves as a guideline for its �Road map to
					Future's Like always, Jamuna Group believes in playing a
					pioneering role and will continue to do so in the years
					ahead.
				</p>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/future-expansion';
</style>

<script>
	export default {
		data() {
			return {
				roadMaps: [
					{
						name: 'Hospital',
					},
					{
						name: 'Paper Mill',
					},
					{
						name: 'Fertilizer',
					},
					{
						name: 'Jute',
					},
					{
						name: 'Pharmaceutical',
					},
					{
						name: 'Resort & Hotel',
					},
				],
			};
		},
		components: {},
	};
</script>
