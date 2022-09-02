<template>
	<Suspense>
		<template #default>
			<businessDetails
				:data="company"
				:images="images"
				:totalImages="totalImages"
				@pageNumber="photos" />
		</template>
		<template #fallback> <skeleton /> </template>
	</Suspense>
</template>

<script>
import { defineAsyncComponent } from 'vue';
import skeleton from '../skeleton/business-details-skeleton';
// import businessDetails from '../global/business-details';
const businessDetails = defineAsyncComponent({
	loader: () => import('../global/business-details'),
	timeout: 2000,
});
export default {
	components: {
		businessDetails,
		skeleton,
	},
	data() {
		return {
			company: {
				businessLogo: '',
				objectfit: true, //For logo size responsiveness
				businessName: '',
				establishDate: '',
				ceo: '',
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
				dfile: '',
				products: '',
				capacity: '',
				manpower: '',
				social: {
					facebook: '',
					instagram: '',
					linkedin: '',
				},
				textSummary: true,

				textDetails: {
					details: '',
					shortDetails: '',
				},
				sharing: {
					url: window.location.origin + this.$route.path,
				},
				networks: [
					{
						network: 'email',
						name: 'Email',
						icon: 'far fa-envelope',
					},
					{
						network: 'facebook',
						name: 'Facebook',
						icon: 'fab fa-facebook',
					},
					{
						network: 'linkedin',
						name: 'LinkedIn',
						icon: 'fab fa-linkedin',
					},
					{
						network: 'messenger',
						name: 'Messenger',
						icon: 'fab fa-facebook-messenger',
					},
					{
						network: 'whatsapp',
						name: 'Whatsapp',
						icon: 'fab fa-whatsapp',
					},
				],
			},
			images: [],
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
		switcher() {
			if (this.$route.params.id) {
				axios
					.get(
						window.location.origin +
							'/frontpage-api/company/' +
							this.$route.params.id
					)
					.then((response) => {
						document.title = response.data.name + ' | jamuna Group';
						var jsn = JSON.parse(response.data.json_data);
						this.company.businessLogo = response.data.image;
						this.company.businessName = response.data.name;
						this.company.establishDate =
							response.data.establish_date;
						this.company.ceo = jsn.ceo_of_the_company;
						this.company.address.officeName = jsn.address;
						this.company.mail = 'mailto:' + jsn.support_email;
						this.company.emailName = jsn.support_email;
						this.company.mobile = jsn.support_phone_number;
						this.company.website = jsn.website;
						this.company.docs = jsn.dfile;
						this.company.products = response.data.products;
						this.company.capacity = response.data.production_cap;
						this.company.manpower = response.data.manpower;
						this.company.textDetails.details =
							response.data.description;
						this.company.textDetails.shortDetails =
							response.data.short_details;
						this.company.social.facebook = jsn.facebook;
						this.company.social.instagram = jsn.instagram;
						this.company.social.linkedin = jsn.linkedin;
					});
			}
			// Lightbox api
			this.photos(this.page);
		},
		photos(page) {
			this.images = [];
			if (this.$route.params.id) {
				axios
					.get(
						window.location.origin +
							'/frontpage-api/company-images/' +
							this.$route.params.id
					)
					.then((res) => {
						this.images = this.paginate(res.data, 4, page);
						this.totalImages = res.data.length;
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
	mounted() {},
};
</script>
