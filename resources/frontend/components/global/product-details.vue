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
							<tr v-if="data.ceo">
								<th>Director</th>
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
					">
					<div class="ql-editor">
						<div class="company-gallery pt-8">
							<div
								class="
									grid grid-cols-1
									lg:grid-cols-4
									2xl:gap-3
									md:grid-cols-2
									gap-5
									pb-8
								">
								<div
									v-for="(item, index) in images"
									:key="index"
									class="image"
									@click="() => showImg(index)">
									<div class="thumbnail">
										<img :src="item.src" alt="" />
									</div>
								</div>
							</div>
						</div>
						<vue-easy-lightbox
							:visible="visibleRef"
							:imgs="images"
							:index="indexRef"
							@hide="onHide"></vue-easy-lightbox>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
@import '../../assets/scss/variables/_business-details';
@import '../../assets/scss/variables/company-gallery';
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
		totalImages: Number,
	},
};
</script>
