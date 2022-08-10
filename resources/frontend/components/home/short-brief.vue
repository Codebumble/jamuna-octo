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
				shortBrief: {
					title: "About our Awesome Business and it's summary",
					description:
						'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde perferendis aliquam odio facere omnis voluptate tempore doloremque dicta, corrupti rerum cupiditate a, fugiat, eos repellat rem ea quam quibusdam nihil dolorem! Tempora beatae facere rerum necessitatibus, tenetur commodi, soluta consequuntur recusandae harum delectus nostrum repellat ullam ipsam debitis dolorem exercitationem!',
					link: '#',
					linkText: 'Learn More',
					linkVisibility: true,
				},
			};
		},
	};
</script>
