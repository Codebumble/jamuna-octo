
<template>
	<newsCenter :data="jamunaTv" />
</template>

<script>
	import newsCenter from '../global/news-center.vue';
	export default {
		components: {
			newsCenter,
		},
		data() {
			return {
				jamunaTv: {
					ytSrc: 'https://www.youtube.com/embed/Kaat7BzcEI0',
					title: 'Jamuna Television known as "Jamuna TV" is a 24 hour news channel of Bangladesh',
					phone: ' +88032135131',
					email: 'hello@jamuna.tv',
					address: {
						officeName: 'Jamuna Television LTD.',
						road: 'KA-244 Jamuna Future Oark Complex',
						location: 'Pragati Ave, Dhaka - 1229',
						country: 'Bangladesh',
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
							alt: 'Jamuna TV',
							name: 'Mrs. Salma Islam',
							position: 'Chairman',
							areas: 'dinajpur',
						},
						{
							imgSrc: '/frontend/images/directors/mem1-1.jpg',
							alt: 'Jamuna TV',
							name: 'Mrs. Salma Islam',
							position: 'Chairman',
							areas: 'dinajpur',
						},
						{
							imgSrc: '/frontend/images/directors/mem1-1.jpg',
							alt: 'Jamuna TV',
							name: 'Mrs. Salma Islam',
							position: 'Chairman',
							areas: 'dinajpur',
						},
						{
							imgSrc: '/frontend/images/directors/mem1-1.jpg',
							alt: 'Jamuna TV',
							name: 'Mrs. Salma Islam',
							position: 'Chairman',
							areas: 'dinajpur',
						},
						{
							imgSrc: '/frontend/images/directors/mem1-1.jpg',
							alt: 'Jamuna TV',
							name: 'Mrs. Salma Islam',
							position: 'Chairman',
							areas: 'dinajpur',
						},
					],
					subDistCorres: [
						{
							imgSrc: '/frontend/images/directors/mem1-1.jpg',
							alt: 'Jamuna TV',
							name: 'Mrs. Salma Islam',
							position: 'Chairman',
							areas: 'dinajpur',
						},
						{
							imgSrc: '/frontend/images/directors/mem1-1.jpg',
							alt: 'Jamuna TV',
							name: 'Mrs. Salma Islam',
							position: 'Chairman',
							areas: 'dinajpur',
						},
						{
							imgSrc: '/frontend/images/directors/mem1-1.jpg',
							alt: 'Jamuna TV',
							name: 'Mrs. Salma Islam',
							position: 'Chairman',
							areas: 'dinajpur',
						},
						{
							imgSrc: '/frontend/images/directors/mem1-1.jpg',
							alt: 'Jamuna TV',
							name: 'Mrs. Salma Islam',
							position: 'Chairman',
							areas: 'dinajpur',
						},
						{
							imgSrc: '/frontend/images/directors/mem1-1.jpg',
							alt: 'Jamuna TV',
							name: 'Mrs. Salma Islam',
							position: 'Chairman',
							areas: 'dinajpur',
						},
					],
				},
			};
		},
	};
</script>
