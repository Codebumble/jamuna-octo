<template>
	<section class="contact pb-8 pt-32">
		<div class="container pb-8">
			<div class="flex flex-col items-center">
				<div class="content w-full mb-6">
					<h2 class="heading">{{contents.header.title}}</h2>
					<p class="description">{{contents.header.desc}}</p>
				</div>
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
