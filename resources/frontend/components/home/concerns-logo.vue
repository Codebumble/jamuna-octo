<template>
	<section class="py-16 overflow-hidden">
		<div class="container">
			<div class="flex flex-col items-center">
				<div class="content w-full mb-6">
					<h2 class="heading">{{ aboutConcerns.heading }}</h2>
					<p class="description">
						{{ aboutConcerns.description }}
					</p>
				</div>
				<div class="logo-slider w-full">
					<div
						class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4 overflow-hidden p-4">
						<div
							class="flex justify-around items-center rounded transition-all concern"
							v-for="logo in concernlogo"
							:key="logo">
							<img
								:src="'/company-images/' + logo.image"
								:alt="logo.name"
								class="w-32" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_concerns-logo';
</style>

<script>
	export default {
		data() {
			return {
				aboutConcerns: {},

				concernlogo: [],
			};
		},
		mounted() {
			axios
				.get(window.location.origin + '/frontpage-api/concern-details')
				.then((response) => {
					this.aboutConcerns = response.data;
				});
			axios
				.get(
					window.location.origin + '/frontpage-api/company-name-logo'
				)
				.then((response) => {
					this.concernlogo = response.data;
				});
		},
	};
</script>
