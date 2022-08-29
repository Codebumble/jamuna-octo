<template>
	<section class="company-profile pb-28 pt-32">
		<div class="container">
			<div class="description">
				<div v-html="cp.descriptions"></div>
			</div>
			<div class="description">
				<h2 class="title">Awards</h2>
				<div v-html="cp.awards"></div>
			</div>
			<div class="description">
				<h2 class="title">HRD & Corporate Governance</h2>
				<div v-html="cp.hdrCorporate"></div>
			</div>
			<div class="description">
				<h2 class="title">Environment: We Care</h2>
				<div v-html="cp.environment"></div>
			</div>
			<div class="description">
				<h2 class="title">Our Goal</h2>
				<div v-html="cp.goals"></div>
			</div>
			<div class="description">
				<h2 class="title">Nation building activities</h2>
				<p v-html="cp.activities"></p>
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
				cp: [],
			};
		},
		mounted() {
			axios
				.get(
					window.location.origin +
						'/frontpage-api/company-profile-data'
				)
				.then((resoponse) => {
					this.cp = response.data;
				});
		},
	};
</script>
