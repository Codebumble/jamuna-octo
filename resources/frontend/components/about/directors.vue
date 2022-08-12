<template>
	<breadcrumb :data="breadcrumb" />
	<section class="directors">
		<div class="container">
			<div class="heading">
				<h2>{{ heading.title }}</h2>
				<p>
					{{ heading.desc }}
				</p>
			</div>
			<div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8 py-8">
				<div
					class="member"
					v-for="memeber in directors">
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
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_directors';
</style>

<script>
	import breadcrumb from '../global/breadcrumb';
	export default {
		components: {
			breadcrumb,
		},
		data() {
			return {
				heading: {
					title: 'Meet Our Board of Directors',
					desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, consequuntur? Exercitationem praesentium inventore cum enim neque molestias aspernatur adipisci culpa.',
				},
				directors: [
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
				breadcrumb: {
					image: '/frontend/images/breadcrumb/directors.jpg',
					alt: 'directors',
					pageTitle: 'Board Of Directors',
					pageDesc:
						'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum animi aliquam voluptates harum aspernatur eveniet velit doloribus aliquid adipisci suscipit?',
				},
			};
		},
	};
</script>
