<template>
	<breadcrumb :data="breadcrumb" />
	<section class="directors angled upper-end">
		<div class="container">
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
					this.breadcrumb = response.data.breadcrumb;
					this.directors = response.data.directors;
				});
		},
	};
</script>
