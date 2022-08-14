<template>
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
				v-for="member in subDistCorres">
				<div class="thumb">
					<img
						:src="member.imgSrc"
						:alt="member.alt"
						class="image max-h-[288px] min-h-[288px]" />
				</div>
				<div class="info">
					<h3>{{ member.name }}</h3>
					<p>{{ member.position }}</p>
				</div>
			</div>
		</div>
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
