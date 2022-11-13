<template>
	<section class="businessDetails pb-28 pt-32">
		<div class="container">
			<div class="flex flex-col lg:flex-row gap-8">
				<div class="w-full lg:w-4/12 flex flex-col gap-8">
					<div
						class="
							border border-slate-100
							p-8
							w-full
							shadow-lg
							rounded-md
							overflow-hidden
						">
						<img
							:src="'/company-images/' + data.businessLogo"
							:alt="data.businessName"
							class="w-full max-w-[338px] max-h-[156px] mx-auto"
							:class="
								data.objectfit ? 'object-cover' : 'object-none'
							" />
					</div>
					<div
						class="
							border border-slate-100
							py-6
							px-4
							w-full
							shadow-lg
							rounded-md
							overflow-hidden
							businessInfo
						">
						<table>
							<tr v-if="data.businessName">
								<th>Business Name</th>
								<td>{{ data.businessName }}</td>
							</tr>
							<tr v-if="data.establishDate">
								<th>Establish Date</th>
								<td>{{ data.establishDate }}</td>
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
								<th>Email</th>
								<td>
									<a
										:href="data.mail"
										class="
											underline
											decoration-dotted
											hover:decoration-solid
											decoration-slate-400
											hover:decoration-red-600
											underline-offset-4
											hover:text-red-600
											transition-all
										"
										>{{ data.emailName }}</a
									>
								</td>
							</tr>
							<tr v-if="data.mobile">
								<th>Phone</th>
								<td>
									<a
										:href="'tel:' + data.mobile"
										class="
											underline
											decoration-dotted
											hover:decoration-solid
											decoration-slate-400
											hover:decoration-red-600
											underline-offset-4
											hover:text-red-600
											transition-all
										"
										>{{ data.mobile }}</a
									>
								</td>
							</tr>
							<tr v-if="data.website">
								<th>Website</th>
								<td>
									<a
										:href="'https://' + data.website"
										class="
											underline
											decoration-dotted
											hover:decoration-solid
											decoration-slate-400
											hover:decoration-red-600
											underline-offset-4
											hover:text-red-600
											transition-all
										"
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
						</table>
					</div>
				</div>
				<div
					class="
						w-full
						lg:w-8/12
						rounded-md
						shadow-lg
						border border-slate-100
						p-8
						overflow-hidden
						businessDetails
						product-image-gallery
					">
					<div
						class="
							grid grid-cols-1
							lg:grid-cols-4
							md:grid-cols-2
							gap-5
							pb-8
						">
						<div
							v-for="(item, index) in visibleImages"
							:key="index"
							class="image"
							@click="() => showImg(index)">
							<div class="thumbnail">
								<img
									:src="item.src"
									:alt="item.name" />
								<h3>{{ item.name }}</h3>
							</div>
						</div>
					</div>
					<vue-awesome-paginate
						:total-items="totalImages"
						:items-per-page="8"
						:max-pages-shown="1000"
						:current-page="currentPage"
						:on-click="onClickHandler"
						:key="currentPage"
						v-if="totalImages > 8">
						<template #prev-button>
							<i class="fas fa-angle-left"></i>
						</template>
						<template #next-button>
							<i class="fas fa-angle-right"></i>
						</template>
					</vue-awesome-paginate>
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
@import '../../assets/scss/variables/_product-gallery.scss';
@import '../../assets/scss/variables/pagination';
</style>

<script>
import VueEasyLightbox from 'vue-easy-lightbox';
export default {
	name: 'productDetails',
	components: {
		VueEasyLightbox,
	},
	data() {
		return {
			visibleRef: false,
			indexRef: 0,
			page: 1,
			currentPage: 1,
			totalImages: 0,
			data: {
				businessLogo: '',
				objectfit: true,
				businessName: '',
				establishDate: '',
				address: {
					officeName: '',
					officeRoad: '',
					location: '',
					country: '',
				},
				mail: '',
				emailName: '',
				mobile: '',
				website: '',
				products: '',
				capacity: '',
				textSummary: true,
				textDetails: {
					details: '',
					shortDetails: '',
				},
			},
			images: [],
		};
	},
	computed: {
		visibleImages() {
			return this.images;
		},
	},
	methods: {
		paginate(array, page_size, page_number) {
			return array.slice(
				(page_number - 1) * page_size,
				page_number * page_size
			);
		},
		photos(page) {
			if (this.$route.path.includes('product/')) {
				axios
					.get(
						window.location.origin +
							'/frontpage-api/product-details/' +
							this.$route.params.id
					)
					.then((response) => {
						document.title =
							response.data.company.name + ' | jamuna Group';
						var jsn = JSON.parse(response.data.company.json_data);
						this.data.businessLogo = response.data.company.image;
						this.data.businessName = response.data.company.name;
						this.data.establishDate =
							response.data.company.establish_date;
						this.data.address.officeName = jsn.address;
						this.data.mail = 'mailto:' + jsn.support_email;
						this.data.emailName = jsn.support_email;
						this.data.mobile = jsn.support_phone_number;
						this.data.website = jsn.website;
						this.data.products = response.data.company.products;
						this.data.capacity =
							response.data.company.production_cap;
						this.images = this.paginate(
							response.data.images,
							8,
							page
						);
						this.totalImages = response.data.images.length;
					})
					.catch(() => {
						this.$router.push({ name: 'not-found' });
					});
			}
		},
		showImg(index) {
			this.indexRef = index;
			this.visibleRef = true;
		},
		onHide() {
			this.visibleRef = false;
		},
		onClickHandler(page) {
			this.currentPage = page;
			this.photos(page);
		},
	},
	mounted() {
		this.photos(this.page);
	},
};
</script>
