<template>
	<section class="founder pb-28 pt-32">
		<div class="container">
			<div class="flex flex-col xl:flex-row items-center gap-8 xl:gap-6">
				<div class="chairperson-image xl:basis-2/4">
					<img
						:src="chairperson.imgSrc"
						:alt="chairperson.alt"
						class="rounded w-full xl:w-7/12 mx-auto lg:max-h-[400px] lg:h-[400px] object-cover object-top" />
				</div>

				<div
					class="chairperson-article xl:basis-2/4 text-center xl:text-left">
					<h2
						class="text-2xl lg:text-4xl text-gray-800 font-bold pb-4 xl:pb-8">
						{{ chairperson.title }}
					</h2>
					<p class="pb-4 xl:pb-8 text-gray-400">
						{{ chairperson.description }}
					</p>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_chairperson';
</style>

<script>
	export default {
		data() {
			return {
				chairperson: {},
			};
		},
		mounted() {
			axios
				.get(
					window.location.origin +
						'/frontpage-api/chairpersson-speech'
				)
				.then((response) => {
					this.chairperson = response.data;
				});
		},
	};
</script>
