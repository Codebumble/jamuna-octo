<template>
	<section class="quality-process pb-28 pt-32">
		<div class="container">
			<div
				class="vision content-box"
				v-html="qp.qp"></div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/quality-process';
</style>

<script>
	export default {
		data() {
			return {
				qp: {},
			};
		},
		mounted() {
			axios
				.get(
					window.location.origin +
						'/frontpage-api/quality-process-data'
				)
				.then((response) => {
					this.qp = response.data;
				});

			console.log(this.qp);
		},
	};
</script>
