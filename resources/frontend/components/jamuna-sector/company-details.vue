<template>
	<breadcrumb :data="company" />
	<businessDetails :data="company" />
</template>

<script>
	import businessDetails from '../global/business-details';
	import breadcrumb from '../global/company-breadcrumb';
	export default {
		components: {
			businessDetails,
			breadcrumb,
		},
		data() {
			return {
				company: {
					businessLogo: '',
					alt: 'image alt',
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
				},
			};
		},
		setup() {},
		metaInfo() {
			return {
				title: this.company.businessName,
				// title: this.FounderDetails.title,
				description: this.company.textDetails.shortDetails.substring(
					0,
					150
				),
				charset: 'utf-8',
				htmlAttrs: {
					lang: 'en',
				},
				og: {
					title: this.company.businessName,
					description:
						this.company.textDetails.shortDetails.substring(0, 150),
					image: this.company.businessLogo,
				},
				twitter: {
					title: this.company.businessName,
					description:
						this.company.textDetails.shortDetails.substring(0, 150),
					image: this.company.businessLogo,
				},
			};
		},
		methods: {
			switcher() {
				axios
					.get(
						window.location.origin +
							'/frontpage-api/company/' +
							this.$route.params.id
					)
					.then((response) => {
						var jsn = JSON.parse(response.data.json_data);
						this.company.businessLogo =
							'/company-images/' + response.data.image;
						this.company.businessName = response.data.name;
						this.company.establishDate =
							response.data.establish_date;
						this.company.ceo = jsn.ceo_of_the_company;
						this.company.address.officeName = jsn.address;
						this.company.mail = 'mailto:' + jsn.support_email;
						this.company.emailName = jsn.support_email;
						this.company.mobile = jsn.support_phone_number;
						this.company.website = jsn.website;
						this.company.products = response.data.products;
						this.company.capacity = response.data.production_cap;
						this.company.manpower = response.data.manpower;
						this.company.textDetails.details =
							response.data.description;
						this.company.textDetails.shortDetails =
							response.data.short_details;
						this.company.social.facebook = jsn.facebook;
					});
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
