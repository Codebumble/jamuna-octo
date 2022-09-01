<template>
	<section class="company-profile pb-28 pt-32">
		<div class="container">
			<div class="text-center pb-12">
				<h2
					class="font-bold text-2xl lg:text-3xl text-gray-800 underline decoration-2 decoration-solid decoration-gray-800 underline-offset-[1rem]">
					Company Profile
				</h2>
			</div>
			<div class="description">
				<div v-html="cp[0].descriptions"></div>
			</div>
			<div class="description">
				<h2 class="title">Awards</h2>
				<div v-html="cp[1].awards"></div>
			</div>
			<div class="description">
				<h2 class="title">HRD & Corporate Governance</h2>
				<div v-html="cp[2].hdrCorporate"></div>
			</div>
			<div class="description">
				<h2 class="title">Environment: We Care</h2>
				<div v-html="cp[3].environment"></div>
			</div>
			<div class="description">
				<h2 class="title">Our Goal</h2>
				<div v-html="cp[4].goals"></div>
			</div>
			<div class="description">
				<h2 class="title">Nation building activities</h2>
				<p v-html="cp[5].activities"></p>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/company-profile';
</style>

<script>
	export default {
		data() {
			return {
				cp: [
					{ descriptions: '' },
					{ awards: '' },
					{ hdrCorporate: '' },
					{ environment: '' },
					{ goals: '' },
					{ activities: '' },
				],
			};
		},
		mounted() {
			axios
				.get(
					window.location.origin +
						'/frontpage-api/company-profile-data'
				)
				.then((response) => {
					this.cp = response.data;
				});
		},
	};
</script>
