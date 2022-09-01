<template>
	<section class="contact pb-8 pt-32">
		<div class="container pb-8">
			<div class="text-center pb-14">
				<h2
					class="font-bold text-2xl lg:text-3xl text-gray-800 underline decoration-2 decoration-solid decoration-gray-800 underline-offset-[1rem]">
					{{contents.header.title}}
				</h2>
			</div>
			<div class="w-full lg:w-[1024px] mx-auto">
				<Accordion :items="contents.items" />
			</div>
		</div>
	</section>
</template>

<style lang="scss">
.c-accordion .c-accordion__item.-active .c-accordion__title{
	@apply bg-gray-100;
}
</style>

<script>
import Accordion from '@dzangolab/vue-accordion';
import '@dzangolab/vue-accordion/dist/accordion.css';

export default {
	components: {
		Accordion,
	},
	mounted() {},
	props: {
		contents: Object,
	},
};
</script>
