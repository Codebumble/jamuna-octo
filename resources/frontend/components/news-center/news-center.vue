<template>
	<breadcrumb :data="breadcrumb" />
	<div></div>
</template>

<script>
	import breadcrumb from '../global/breadcrumb';
	import LaravelVuePagination from 'laravel-vue-pagination';
	export default {
		components: {
			breadcrumb,
			pagination: LaravelVuePagination,
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
	};
</script>
