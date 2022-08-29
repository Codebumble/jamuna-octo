<template>
	<section class="businessDetails pb-28 pt-32">
		<div class="container">
			<div class="flex flex-col lg:flex-row gap-8">
				<div class="w-full lg:w-4/12 flex flex-col gap-8">
					<div
						class="border border-slate-100 p-8 w-full shadow-lg rounded-md overflow-hidden">
						<img
							:src="data.businessLogo"
							:alt="data.alt"
							class="w-full max-w-[338px] max-h-[156px] mx-auto"
							:class="
								data.objectfit ? 'object-cover' : 'object-none'
							" />
					</div>
					<div
						class="border border-slate-100 py-6 px-4 w-full shadow-lg rounded-md overflow-hidden businessInfo">
						<table>
							<tr v-if="data.businessName">
								<th>Business Name</th>
								<td>{{ data.businessName }}</td>
							</tr>
							<tr v-if="data.establishDate">
								<th>Establish Date</th>
								<td>{{ data.establishDate }}</td>
							</tr>
							<tr v-if="data.ceo">
								<th>Name of The CEO</th>
								<td>{{ data.ceo }}</td>
							</tr>
							<tr v-if="data.address.officeName">
								<th>Address</th>
								<td>
									<span
										class="block"
										v-if="data.address.officeName"
										>{{ data.address.officeName }}</span
									>
									<span
										class="block"
										v-if="data.address.officeRoad"
										>{{ data.address.officeRoad }}</span
									>
									<span
										class="block"
										v-if="data.address.location"
										>{{ data.address.location }}</span
									>
									<span
										class="block"
										v-if="data.address.country"
										>{{ data.address.country }}</span
									>
								</td>
							</tr>
							<tr v-if="data.mail && data.emailName">
								<th>Support Email</th>
								<td>
									<a
										:href="data.mail"
										class="underline decoration-dotted hover:decoration-solid decoration-slate-400 hover:decoration-red-600 underline-offset-4 hover:text-red-600 transition-all"
										>{{ data.emailName }}</a
									>
								</td>
							</tr>
							<tr v-if="data.mobile">
								<th>Support Phone</th>
								<td>
									<a
										:href="'tel:' + data.mobile"
										class="underline decoration-dotted hover:decoration-solid decoration-slate-400 hover:decoration-red-600 underline-offset-4 hover:text-red-600 transition-all"
										>{{ data.mobile }}</a
									>
								</td>
							</tr>
							<tr v-if="data.website">
								<th>Website</th>
								<td>
									<a
										:href="data.website"
										class="underline decoration-dotted hover:decoration-solid decoration-slate-400 hover:decoration-red-600 underline-offset-4 hover:text-red-600 transition-all"
										>{{ data.businessName }}</a
									>
								</td>
							</tr>
							<tr v-if="data.products">
								<th>Products</th>
								<td>{{ data.products }}</td>
							</tr>
							<tr v-if="data.capacity">
								<th>Production Capacity</th>
								<td>{{ data.capacity }}</td>
							</tr>
							<tr v-if="data.manpower">
								<th>Manpower</th>
								<td>{{ data.manpower }}</td>
							</tr>
							<tr class="items-center">
								<th>Follow</th>
								<td>
									<ul class="flex">
										<li class="">
											<a
												:href="data.social.facebook"
												class="hover:text-blue-600 transition-all"
												><i class="fab fa-facebook"></i
											></a>
										</li>
										<li class="">
											<a
												:href="data.social.instagram"
												class="hover:text-red-600 transition-all"
												><i class="fab fa-instagram"></i
											></a>
										</li>
										<li class="">
											<a
												:href="data.social.linkedin"
												class="hover:text-[#0077b5] transition-all"
												><i class="fab fa-linkedin"></i
											></a>
										</li>
									</ul>
								</td>
							</tr>
							<tr>
								<th>Share</th>
								<td class="share">
									<ShareNetwork
										v-for="network in data.networks"
										:network="network.network"
										:key="network.network"
										:style="{
											backgroundColor: network.color,
										}"
										:url="data.sharing.url">
										<i :class="network.icon"></i>
									</ShareNetwork>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div
					class="w-full lg:w-8/12 rounded-md shadow-lg border border-slate-100 p-8 overflow-hidden businessDetails">
					<h2
						class="font-bold text-lg underline decoration-wavy decoration-gray-800 text-gray-800 underline-offset-4 mb-4">
						About this Business
					</h2>
					<div
						v-if="data.textDetails"
						v-html="data.textDetails.details"></div>
					<div v-if="$route.name == 'jdgu'">
						<h3 class="text-lg text-gray-800 font-bold underline">
							List of Products
						</h3>

						<div class="flex flex-col">
							<div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
								<div
									class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
									<div class="overflow-hidden">
										<table class="min-w-full border">
											<thead class="bg-white border-b">
												<tr>
													<th
														scope="col"
														class="text-sm font-medium text-gray-900 px-3 py-3 text-left">
														#
													</th>
													<th
														scope="col"
														class="text-sm font-medium text-gray-900 px-3 py-3 text-left">
														Products List
													</th>
												</tr>
											</thead>

											<tbody>
												<tr
													class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"
													v-for="(
														product, item
													) in data.productList"
													:key="item">
													<td
														class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900">
														{{ item + 1 }}
													</td>
													<td
														class="text-sm text-gray-900 font-light px-3 py-3 whitespace-nowrap">
														{{ product.name }}
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
								<div
									class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
									<div class="overflow-hidden">
										<table class="min-w-full border">
											<thead class="bg-white border-b">
												<tr>
													<th
														scope="col"
														class="text-sm font-medium text-gray-900 px-3 py-3 text-left">
														#
													</th>
													<th
														scope="col"
														class="text-sm font-medium text-gray-900 px-3 py-3 text-left">
														List of Buyerer
													</th>
												</tr>
											</thead>

											<tbody>
												<tr
													class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"
													v-for="(
														buyer, item
													) in data.buyerList"
													:key="item">
													<td
														class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900">
														{{ item + 1 }}
													</td>
													<td
														class="text-sm text-gray-900 font-light px-3 py-3 whitespace-nowrap">
														{{ buyer.name }}
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="company-gallery pt-8">
						<div
							class="grid grid-cols-1 lg:grid-cols-4 2xl:gap-3 md:grid-cols-2 gap-5 pb-8">
							<div
								v-for="(item, index) in images"
								:key="index"
								class="image"
								@click="() => showImg(index)">
								<div class="thumbnail">
									<img
										:src="item.src"
										alt="" />
								</div>
							</div>
						</div>
						<vue-awesome-paginate
							:total-items="30"
							:items-per-page="4"
							:max-pages-shown="3"
							:current-page="currentPage"
							:on-click="onClickHandler"
							:key="currentPage">
							<template #prev-button>
								<i class="fas fa-angle-left"></i>
							</template>
							<template #next-button>
								<i class="fas fa-angle-right"></i>
							</template>
						</vue-awesome-paginate>
					</div>
					<vue-easy-lightbox
						:visible="visibleRef"
						:imgs="images"
						:index="indexRef"
						@hide="onHide"></vue-easy-lightbox>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_business-details';
	@import '../../assets/scss/variables/company-gallery';
	@import '../../assets/scss/variables/pagination';
</style>

<script>
	import VueEasyLightbox from 'vue-easy-lightbox';
	export default {
		name: 'businessDetails',
		components: {
			VueEasyLightbox,
		},
		data() {
			return {
				visibleRef: false,
				indexRef: 0,
				currentPage: 1,
			};
		},
		created() {
			this.$watch(
				() => this.$route.params,
				(toParams, PreviousParams) => {
					this.currentPage = 1;
				}
			);
		},
		methods: {
			showImg(index) {
				this.indexRef = index;
				this.visibleRef = true;
			},
			onHide() {
				this.visibleRef = false;
			},
			onClickHandler(page) {
				this.currentPage = page;
				this.$emit('pageNumber', page);
			},
		},
		props: {
			data: Object,
			images: Array,
		},
	};
</script>
