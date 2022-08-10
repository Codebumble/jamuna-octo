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
				chairperson: {
					imgSrc: '/frontend/images/contents/banner.jpg',
					imgAlt: 'meaw',
					title: 'What our Chairperson Said',
					description:
						'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut in vitae quibusdam culpa. Non veniam perspiciatis numquam sunt itaque. Dolorem velit at voluptatibus optio praesentium. Velit, natus deleniti. Commodi neque impedit cupiditate odio excepturi consequuntur molestiae harum corporis, quas ullam, eius vel inventore modi velit ea quia? Perspiciatis distinctio laudantium, sed voluptas placeat excepturi obcaecati necessitatibus saepe deleniti, dolores ut?',
					linkText: 'Read More',
					link: '#',
					linkVisibility: true,
				},
			};
		},
	};
</script>
