<template>
	<section class="chairperson bg-slate-50">
		<div class="container">
			<div class="flex flex-col xl:flex-row items-center gap-8 xl:gap-16">
				<div class="chairperson-image xl:basis-2/4">
					<img
						:src="chairperson.imgSrc"
						:alt="chairperson.alt"
						class="rounded-2xl w-9/12 xl:w-11/12 mx-auto" />
				</div>

				<div
					class="chairperson-article xl:basis-2/4 text-center xl:text-left">
					<h2 class="text-4xl text-gray-800 font-bold pb-4 xl:pb-8">
						{{ chairperson.title }}
					</h2>
					<p class="pb-4 xl:pb-8">
						{{ chairperson.description }}
					</p>
					<a
						:href="chairperson.link"
						v-if="chairperson.linkVisibility"
						class="button block mx-auto xl:mx-0">
						{{ chairperson.linkText }}
					</a>
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
		mounted(){

			axios
      		.get(window.location.origin+'/frontpage-api/chairpersson-speech')
      		.then(response => {
				this.chairperson = response.data;
				});

		},
	};
</script>
