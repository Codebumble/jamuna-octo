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

<style>
@import url('https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap');
@import url('https://fonts.gstatic.com');
@import '../../../vendors/css/editors/quill/quill.bubble.css';
@import '../../../vendors/css/editors/quill/quill.snow.css';
@import '../../../vendors/css/editors/quill/monokai-sublime.min.css';
@import url('https://cdn.quilljs.com/1.3.6/quill.core.css');
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
