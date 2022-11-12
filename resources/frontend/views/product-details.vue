<template>
	<ProductDetails :data="company" :images="images" />
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
		};
	},
	methods: {
		switcher() {
			if (this.$route.path.includes('product/')) {
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
					})
					.catch(() => {
						this.$router.push({ name: 'not-found' });
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
