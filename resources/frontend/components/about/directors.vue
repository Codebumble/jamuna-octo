<template>
	<breadcrumb :data="directors" />
	<section class="directors">
		<div class="container">
			<div class="heading">
				<h2>Meet Our Board of Directors</h2>
				<p>
					Lorem ipsum dolor sit amet consectetur adipisicing elit.
					Quod, consequuntur? Exercitationem praesentium inventore cum
					enim neque molestias aspernatur adipisci culpa.
				</p>
			</div>
			<div class="grid grid-cols-3 gap-4">
				<div class="member">
					<div class="thumb">
						<img
							src="/frontend/images/directors/mem1-1.jpg"
							alt="alt"
							class="" />
					</div>
					<div class="info">
						<h3>Mr. John Doe</h3>
						<p>Chairman</p>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	import breadcrumb from '../global/breadcrumb';
	export default {
		components: {
			breadcrumb,
		},
		data() {
			return {
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
				directors: {
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
