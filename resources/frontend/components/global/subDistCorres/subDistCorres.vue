<template>
	<div class="container">

		<pagination
			:data="subDistCorres"
			:limit="8">
			<template #prev-nav>
				<span>&lt; Previous</span>
			</template>
			<template #next-nav>
				<span>Next &gt;</span>
			</template>
		</pagination>
	</div>
</template>

<script>
	import LaravelVuePagination from 'laravel-vue-pagination';
	//	NOTEEEEEEEEEEEEEEEEE

	// Follow this repository for more about laravel pagination https://github.com/gilbitron/laravel-vue-pagination

	// NOTE ENDDDDDDDDDDDDDDD
	export default {
		components: {
			Pagination: LaravelVuePagination,
		},
		data() {
			return {
				subDistHeading: {
					title: 'Correspondence by Sub-Disctrict',
					desc: "Jamuna TV has it's own correspondence office in Dhaka. We are the only TV station in Bangladesh to have a correspondence office by sub-district.",
				},
				subDistCorres: [
					{
						imgSrc: '/frontend/images/directors/mem1-1.jpg',
						alt: 'Jamuna TV',
						name: 'Mrs. Salma Islam',
						position: 'Chairman',
					},
					{
						imgSrc: '/frontend/images/directors/mem1-1.jpg',
						alt: 'Jamuna TV',
						name: 'Mrs. Salma Islam',
						position: 'Chairman',
					},
					{
						imgSrc: '/frontend/images/directors/mem1-1.jpg',
						alt: 'Jamuna TV',
						name: 'Mrs. Salma Islam',
						position: 'Chairman',
					},
					{
						imgSrc: '/frontend/images/directors/mem1-1.jpg',
						alt: 'Jamuna TV',
						name: 'Mrs. Salma Islam',
						position: 'Chairman',
					},
					{
						imgSrc: '/frontend/images/directors/mem1-1.jpg',
						alt: 'Jamuna TV',
						name: 'Mrs. Salma Islam',
						position: 'Chairman',
					},
					{
						imgSrc: '/frontend/images/directors/mem1-1.jpg',
						alt: 'Jamuna TV',
						name: 'Mrs. Salma Islam',
						position: 'Chairman',
					},
				],
			};
		},
		mounted() {
			this.getResults();
		},
		methods: {
			getResults(page = 1) {
				axios.get('api here?pgae=' + page).then((response) => {
					// this.subDistCorres = response.data;
					//	NOTEEEEEEEEEEEEEEEEE

					// Follow this repository for more about laravel pagination https://github.com/gilbitron/laravel-vue-pagination

					// NOTE ENDDDDDDDDDDDDDDD
					console.table(this.subDistCorres);
				});
			},
		},
	};
</script>
