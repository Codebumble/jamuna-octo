<template>
	<ProductDetails
		:data="company"
		:images="images"
		:totalImages="totalImages"
		@pageNumber="photos" />
</template>
<style>
</style>
<script>
import ProductDetails from '../components/global/product-details.vue';

export default {
	components: {
		ProductDetails,
	},
	data() {
		return {
			company: {
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
			imgs: [],
			page: 1,
			totalImages: 0,
		};
	},
	methods: {
		paginate(array, page_size, page_number) {
			return array.slice(
				(page_number - 1) * page_size,
				page_number * page_size
			);
		},
		photos(page) {
			this.images = this.paginate(this.imgs, 1, page);
			this.totalImages = this.imgs.length;
			// this.images = this.paginate(res.data, 4, page);
			// this.totalImages = res.data.length;
		},
		switcher() {
			if (this.$route.path.includes('product/')) {
				this.photos(this.page);
				axios
					.get(
						window.location.origin +
							'/frontpage-api/product-details/' +
							this.$route.params.id
					)
					.then((response) => {
						console.log(response.data);
						document.title = response.data.name + ' | jamuna Group';
						var jsn = JSON.parse(response.data.company.json_data);
						this.company.businessLogo = response.data.company.image;
						this.company.businessName = response.data.company.name;
						this.company.establishDate =
							response.data.company.establish_date;
						this.company.address.officeName = jsn.address;
						this.company.mail = 'mailto:' + jsn.support_email;
						this.company.emailName = jsn.support_email;
						this.company.mobile = jsn.support_phone_number;
						this.company.website = jsn.website;
						this.company.products = response.data.company.products;
						this.company.capacity =
							response.data.company.production_cap;
						this.images = response.data.images;
						this.imgs = response.data.images;
						this.totalImages = response.data.images;
					})
					.catch((e) => {
						console.log(e);
						// this.$router.push({ name: 'not-found' });
					});
			}
		},
	},
	created() {
		this.switcher();
		this.$watch(
			() => this.$route.params,
			(toParams, PreviousParams) => {
				this.switcher();
			}
		);
	},
};
</script>
