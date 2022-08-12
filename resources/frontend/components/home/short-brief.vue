<template>
	<section class="short-brief">
		<div class="container overflow-hidden">
			<div class="flex items-center flex-col">
				<div class="brief-title">
					<h2
						class="font-bold text-4xl text-center xl:w-8/12 text-gray-800">
						{{ shortBrief.title }}
					</h2>
				</div>
				<div class="brief-desc">
					<p class="text-center">
						{{ shortBrief.description }}
					</p>
				</div>
				<div class="learn-btn">
					<a
						:href="shortBrief.link"
						v-if="shortBrief.linkVisibility"
						class="button !py-3 !rounded-full">
						{{ shortBrief.linkText }}
					</a>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_short-brief';
</style>

<script>
	export default {
		data() {
			return {
				shortBrief: {},
			};
		},
		mounted() {
			axios
				.get(window.location.origin + '/frontpage-api/shortBrief')
				.then((response) => {
					this.shortBrief = response.data;
				});
		},
	};
</script>
