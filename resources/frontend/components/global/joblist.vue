<template>
	<section class="contact pb-28 pt-32">
		<div class="container pb-8">
			<div class="py-8">
				<h2
					class="text-3xl text-gray-800 text-center w-full lg:w-4/6 mx-auto font-bold">
					{{ jobList.categoryTitle }}
				</h2>
				<div class="cards">
					<div
						class="card"
						v-for="category in jobList.jobCategories"
						:key="category">
						<div class="icon">
							<i :class="category.icon"></i>
						</div>
						<div>
							<h4 class="font-bold text-xl text-gray-800 py-2">
								{{ category.cateName }}
							</h4>
							<p class="text-base text-gray-500">
								{{ category.jobAvailable + ' Jobs Available' }}
							</p>
						</div>
					</div>
				</div>
				<div class="jobList">
					<h2
						class="text-3xl text-gray-800 text-center w-full lg:w-4/6 mx-auto font-bold">
						Available Job Circulars
					</h2>
					<div class="cards">
						<div
							class="card flex-col !items-start !px-4"
							v-for="circular in jobList.circulars"
							:key="circular">
							<div class="flex gap-3 items-center">
								<div>
									<img
										:src="circular.compLogo"
										:alt="circular.compName"
										class="w-8" />
								</div>
								<div>
									<h4 class="font-bold">
										{{ circular.compName }}
									</h4>
									<p class="text-sm">
										{{ circular.location }}
									</p>
								</div>
							</div>
							<div>
								<h2 class="font-bold pb-1">
									{{ circular.jobTitle }}
								</h2>
								<p class="text-sm">{{ circular.empTime }}</p>
							</div>
							<div class="exerp">
								<p>
									{{ circular.shortDesc.substring(0, 62) }}
								</p>
							</div>
							<div
								class="flex justify-between w-full flex-col xl:flex-row">
								<div>
									<span
										class="font-bold text-xl text-gray-800">
										{{ circular.salary }}
									</span>
									<span>/month</span>
								</div>
								<div class="my-4 xl:my-0">
									<router-link
										:to="circular.detailsLink"
										class="rounded-md bg-red-100 text-red-600 font-bold transition-all hover:text-white hover:bg-red-600 px-2.5 py-2">
										View Details
									</router-link>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_career';
</style>

<script>
	export default {
		data() {
			return {
				jobList: {
					categoryTitle: 'One Platform Many Solutions',
					jobCategories: [
						{
							cateName: 'Marketing & Communication',
							jobAvailable: '58',
							icon: 'fas fa-bullhorn',
						},
						{
							cateName: 'Design & Development',
							jobAvailable: '120',
							icon: 'fas fa-pencil-ruler',
						},
						{
							cateName: 'Human Research & Development',
							jobAvailable: '199',
							icon: 'fas fa-baby',
						},
						{
							cateName: 'Finance Management',
							jobAvailable: '234',
							icon: 'fas fa-chart-line',
						},
						{
							cateName: 'Armforce Guide & Security',
							jobAvailable: '120',
							icon: 'fas fa-user-shield',
						},
						{
							cateName: 'Business & Consulting',
							jobAvailable: '47',
							icon: 'fas fa-project-diagram',
						},
					],
					circulars: [
						{
							compLogo: '/frontend/images/logo/microsoft.svg',
							compName: 'Microsoft',
							location: 'San Francisco, CA',
							jobTitle: 'Technical Support Engineer',
							empTime: 'Full-time',
							shortDesc:
								"You will be expected to lead the comapany's entire UI stratagy",
							salary: '$6700',
							detailsLink: '/career-details/1',
						},
						{
							compLogo: '/frontend/images/logo/microsoft.svg',
							compName: 'Microsoft',
							location: 'San Francisco, CA',
							jobTitle: 'Technical Support Engineer',
							empTime: 'Full-time',
							shortDesc:
								"You will be expected to lead the comapany's entire UI stratagy",
							salary: '$6700',
							detailsLink: '/career-details/2',
						},
						{
							compLogo: '/frontend/images/logo/microsoft.svg',
							compName: 'Microsoft',
							location: 'San Francisco, CA',
							jobTitle: 'Technical Support Engineer',
							empTime: 'Full-time',
							shortDesc:
								"You will be expected to lead the comapany's entire UI stratagy",
							salary: '$6700',
							detailsLink: '/career-details/3',
						},
						{
							compLogo: '/frontend/images/logo/microsoft.svg',
							compName: 'Microsoft',
							location: 'San Francisco, CA',
							jobTitle: 'Technical Support Engineer',
							empTime: 'Full-time',
							shortDesc:
								"You will be expected to lead the comapany's entire UI stratagy",
							salary: '$6700',
							detailsLink: '/career-details/4',
						},
					],
				},
			};
		},
		props: {
			data: Object,
		},
	};
</script>
