<template>
	<section class="contact pb-28 pt-32">
		<div class="container pb-8">
			<div class="py-8">
				<h2 class="text-3xl text-gray-800 text-center lg:w-4/6 mx-auto font-bold w-102 skeleton_bg h-8"></h2>
				<div class="cards">
					<div
						class="card"
						v-for="key in 4"
						:key="key">
						<div class="icon w-10 h-10 skeleton_bg"></div>
						<div>
							<h4 class="font-bold text-xl text-gray-800 py-2 w-44"></h4>
							<p class="text-base text-gray-500 skeleton_bg w-30 h-5 mx-auto"></p>
						</div>
					</div>
				</div>
				<div class="jobList">
					<h2 class="w-full lg:w-4/6 mx-auto skeleton_bg h-8"></h2>
					<div class="cards">
						<div
							class="card flex-col !items-start !px-4"
							v-for="circular in 4"
							:key="circular">
							<div class="flex gap-3 items-center">
								<div class="w-16">
									<img
										:src="circular.compLogo"
										:alt="circular.compName"
										class="w-full" />
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
								<p class="text-sm capitalize">
									{{ circular.empTime }}
								</p>
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
		mounted() {
			axios
				.get(
					window.location.origin +
						'/frontpage-api/circular-and-category-short-list'
				)
				.then((response) => {
					this.jobList.jobCategories = response.data.jobCategories;
					this.jobList.circulars = response.data.circulars;
				});
		},
		data() {
			return {
				jobList: {
					categoryTitle: 'One Platform Many Solutions',
					jobCategories: [],
					circulars: [],
				},
			};
		},
	};
</script>
