<template>
	<section class="py-20">
		<div class="container pb-8">
			<div class="py-8">
				<div class="jobList">
					<h2
						class="text-3xl text-gray-800 text-center w-full lg:w-4/6 mx-auto font-bold">
						Available Tenders
					</h2>
					<div class="cards">
						<div
							class="card flex-col !items-start !px-4"
							v-for="tender in tenders"
							:key="tender">
							<div class="flex gap-3 items-center">
								<div class="w-16">
									<img
										:src="tender.comp_image"
										:alt="tender.comp_name"
										class="w-full" />
								</div>
								<div>
									<h4 class="font-bold">
										{{ tender.comp_name }}
									</h4>
									<p class="text-sm">
										{{ tender.location }}
									</p>
								</div>
							</div>
							<div>
								<h2 class="font-bold pb-1">
									{{ tender.title }}
								</h2>
								<p class="capitalize">
									<span class="text-base font-semibold">
										Publish Date:
									</span>
									{{ tender.publish_date }}
								</p>
								<p class="capitalize">
									<span class="text-base font-semibold">
										Last Selling Date:
									</span>
									{{ tender.last_date }}
								</p>
								<p class="capitalize">
									<span class="text-base font-semibold">
										Procurement Method:
									</span>
									{{ tender.proc_method }}
								</p>
							</div>
							<div
								class="flex justify-between w-full flex-col xl:flex-row">
								<div class="my-4 xl:my-0">
									<router-link
										:to="'/e-tender/' + tender.id"
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
	@import '../assets/scss/variables/_tender';
</style>

<script>
	export default {
		data() {
			return {
				tenders: [],
			};
		},
		mounted() {
			axios
				.get(
					window.location.origin +
						'/frontpage-api/view-tenders'
				)
				.then((response) => {
					this.tenders = response.data
				});
		},
	};
</script>
