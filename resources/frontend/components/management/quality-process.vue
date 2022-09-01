<template>
	<section class="quality-process pb-28 pt-32">
		<div class="container">
			<div class="text-center pb-14">
				<h2
					class="font-bold text-2xl lg:text-3xl text-gray-800 underline decoration-2 decoration-solid decoration-gray-800 underline-offset-[1rem]">
					Quality Process
				</h2>
			</div>
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
		},
	};
</script>
