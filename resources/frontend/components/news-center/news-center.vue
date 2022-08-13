<template>
	<breadcrumb :data="breadcrumb" />

	<section class="news-center">
		<div class="container py-8">
			<div
				class="flex gap-4 justify-center items-center flex-col xl:flex-row">
				<div class="yt basis-4/2">
					<iframe
						src="https://www.youtube.com/embed/Kaat7BzcEI0"
						title="YouTube video player"
						frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
						allowfullscreen
						class="rounded-md w-72 h-56 xs:w-98"></iframe>
				</div>
				<div
					class="md:w-8/12 xl:border-l-2 border-gray-400 min-h-[250px] basis-4/2 py-4 px-8 xl:ml-4">
					<h2 class="text-xl font-bold mb-4">
						Jamuna Television known as "Jamuna TV" is a 24 hour news
						channel of Bangladesh
					</h2>
					<div
						class="flex flex-col sm:flex-row xl:flex-col justify-between">
						<div class="mb-4">
							<h4 class="text-md font-bold">Contact Us:</h4>
							<span class="block">Phone: +88032135131</span>
							<span class="block">Email: hello@jamuna.tv</span>
						</div>
						<div class="">
							<h4 class="text-md font-bold">Address:</h4>
							<span class="block">Jamuna Television LTD.</span>
							<span class="block"
								>KA-244 Jamuna Future Oark Complex</span
							>
							<span class="block">Pragati Ave, Dhaka - 1229</span>
							<span class="block">Bangladesh</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<distCorres />
		<subDistCorres />
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_news-center';
</style>

<script>
	import breadcrumb from '../global/breadcrumb';
	import subDistCorres from './subDistCorres/subDistCorres.vue';
	import distCorres from './distCorres/distCorres.vue';
	export default {
		components: {
			breadcrumb,
			subDistCorres,
			distCorres,
		},
		data() {
			return {
				breadcrumb: {
					image: '/frontend/images/breadcrumb/directors.jpg',
					alt: 'directors',
					pageTitle: 'News Center',
					pageDesc:
						'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum animi aliquam voluptates harum aspernatur eveniet velit doloribus aliquid adipisci suscipit?',
				},
			};
		},
	};
</script>
