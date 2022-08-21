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
		setup() {
			useHead({
				title: 'Hoorain HTF | Jamuna Group',
				meta: [
					{
						name: `description`,
						content: `Jamuna Group is one of the largest Bangladeshi industrial conglomerates. The industries under this conglomerate include Textiles, Chemicals, Leather, motor cycles, Consumer products, Media, Advertisement etc.`,
					},
					{
						'http-equiv': `Content-Type`,
						content: `text/html; charset=UTF-8`,
					},
					{
						name: 'viewport',
						content:
							'width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui',
					},
				],
			});
		},
		mounted() {
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
					this.company.establishDate = response.data.establish_date;
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
	};
</script>
