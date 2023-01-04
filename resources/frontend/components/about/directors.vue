<template>
	<section class="directors pb-20 pt-28">
		<div class="container">
			<div class="text-center pb-14">
				<h2
					class="font-bold text-2xl lg:text-3xl text-gray-800 underline decoration-2 decoration-solid decoration-gray-800 underline-offset-[1rem]">
					Board Of Directors
				</h2>
			</div>
			<div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8 pb-8">
				<div
					class="member"
					v-for="(memeber, key) in directors"
					:key="key">
					<div class="thumb">
						<img
							:src="memeber.imgSrc"
							:alt="memeber.alt"
							class="image max-h-[394px] min-h-[394px]" />
					</div>
					<div class="info">
						<h3>{{ memeber.name }}</h3>
						<p>{{ memeber.position }}</p>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_directors';
</style>

<script>
	import breadcrumb from '../global/breadcrumb';
	export default {
		components: {
			breadcrumb,
		},
		data() {
			return {
				heading: {},
				directors: [],
				breadcrumb: {},
			};
		},
		mounted() {
			axios
				.get(window.location.origin + '/frontpage-api/directors-list')
				.then((response) => {
					// this.heading = response.data.heading;
					this.directors = response.data.directors;
				});
		},
	};
</script>
