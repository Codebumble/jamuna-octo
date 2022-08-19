<template>
	<section class="py-8 bg-slate-50">
		<div class="container">
			<div class="flex flex-col xl:flex-row items-center gap-8 xl:gap-16">
				<div
					class="chairperson-article xl:basis-2/4 text-center xl:text-left lg:order-1 order-2">
					<h2
						class="text-2xl lg:text-4xl text-gray-800 font-bold pb-4 xl:pb-8">
						About Our Founder
					</h2>
					<p class="pb-4 xl:pb-8 text-gray-400">
						Lorem ipsum dolor sit amet consectetur adipisicing elit.
						Assumenda iure veniam nam sunt est accusantium natus
						iste possimus tempora fuga, debitis, nisi repellendus
						adipisci animi. Consequuntur aut qui cum quos!
					</p>
					<router-link
						to="/founder"
						class="button block mx-auto lg:mx-0 mt-2 lg:mt-0"
						>Read More...</router-link
					>
				</div>
				<div class="chairperson-image xl:basis-2/4 lg:order-2 order-1">
					<img
						src="/frontend/images/contents/Nurul_Islam_Babul.jpg"
						alt="chairperson.alt"
						class="rounded-2xl w-full xl:w-11/12 mx-auto lg:max-h-[500px] lg:h-[500px] object-cover object-top" />
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss"></style>

<script>
	export default {
		name: 'about founder',
	};
</script>
