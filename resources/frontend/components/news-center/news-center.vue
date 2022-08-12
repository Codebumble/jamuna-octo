<template>
	<breadcrumb :data="breadcrumb" />

	<section class="news-center">
		<div class="container py-8">
			<div
				class="flex gap-4 justify-center items-center flex-col xl:flex-row">
				<div class="yt basis-4/2">
					<iframe
						width="560"
						height="315"
						src="https://www.youtube.com/embed/Kaat7BzcEI0"
						title="YouTube video player"
						frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
						allowfullscreen
						class="rounded-md"></iframe>
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
		<div class="container">
			<div class="heading">
				<h2>{{ distHeading.title }}</h2>
				<p>
					{{ distHeading.desc }}
				</p>
			</div>
			<div
				class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 py-8">
				<div
					class="member"
					v-for="memeber in distCorres">
					<div class="thumb">
						<img
							:src="memeber.imgSrc"
							:alt="memeber.alt"
							class="image" />
					</div>
					<div class="info">
						<h3>{{ memeber.name }}</h3>
						<p>{{ memeber.position }}</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="heading">
				<h2>{{ subDistHeading.title }}</h2>
				<p>
					{{ subDistHeading.desc }}
				</p>
			</div>
			<div
				class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-8 py-8">
				<div
					class="member"
					v-for="memeber in subDistCorres">
					<div class="thumb">
						<img
							:src="memeber.imgSrc"
							:alt="memeber.alt"
							class="image" />
					</div>
					<div class="info">
						<h3>{{ memeber.name }}</h3>
						<p>{{ memeber.position }}</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- <button @click="backPage">prev</button>
	<button
		v-for="item in Math.ceil(data.length / perPage)"
		:key="item"
		@click="() => goToPage(item)">
		{{ item }}
	</button>
	<button @click="nextPage">next</button> -->
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_news-center';
</style>

<script>
	import breadcrumb from '../global/breadcrumb';
	import handlePagination from './handlePagination';
	export default {
		components: {
			breadcrumb,
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
				distHeading: {
					title: 'Correspondence by Disctrict',
					desc: "Jamuna TV has it's own correspondence office in Dhaka. We are the only TV station in Bangladesh to have a correspondence office by district.",
				},
				subDistHeading: {
					title: 'Correspondence by Sub-Disctrict',
					desc: "Jamuna TV has it's own correspondence office in Dhaka. We are the only TV station in Bangladesh to have a correspondence office by sub-district.",
				},
				distCorres: [
					{
						imgSrc: '/frontend/images/directors/mem1-1.jpg',
						name: 'Mrs. Salma Islam',
						position: 'Chairman',
					},
					{
						imgSrc: '/frontend/images/directors/mem6-1.jpg',
						name: 'Md. Shamim Islam',
						position: 'Managing Director',
					},
					{
						imgSrc: '/frontend/images/directors/mem1-1.jpg',
						name: 'Mrs. Shariat Tasreen Soniya',
						position: 'Group Director',
					},
					{
						imgSrc: '/frontend/images/directors/mem1-1.jpg',
						name: 'Mrs. Monika Nazneen Islam',
						position: 'Group Director',
					},
					{
						imgSrc: '/frontend/images/directors/mem1-1.jpg',
						name: 'Mrs. Sumaiya Rozalin Islam',
						position: 'Group Director',
					},
				],
				subDistCorres: [
					{
						imgSrc: '/frontend/images/directors/mem1-1.jpg',
						name: 'Mrs. Salma Islam',
						position: 'Chairman',
					},
					{
						imgSrc: '/frontend/images/directors/mem6-1.jpg',
						name: 'Md. Shamim Islam',
						position: 'Managing Director',
					},
					{
						imgSrc: '/frontend/images/directors/mem1-1.jpg',
						name: 'Mrs. Shariat Tasreen Soniya',
						position: 'Group Director',
					},
					{
						imgSrc: '/frontend/images/directors/mem1-1.jpg',
						name: 'Mrs. Monika Nazneen Islam',
						position: 'Group Director',
					},
					{
						imgSrc: '/frontend/images/directors/mem1-1.jpg',
						name: 'Mrs. Sumaiya Rozalin Islam',
						position: 'Group Director',
					},
				],
			};
		},
		setup() {
			const handlePaginationValue = handlePagination();

			return { ...handlePaginationValue };
		},
	};
</script>
