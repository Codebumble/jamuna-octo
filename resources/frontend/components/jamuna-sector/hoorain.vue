<template>
	<businessDetails :data="hoorain" />
</template>

<script>
	import businessDetails from '../global/business-details';
	export default {
		components: {
			businessDetails,
		},
		data() {
			return {
				hoorain: {
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
						details:
							'',
					},
				},
			};
		},
		mounted(){
			axios
				.get(window.location.origin + '/frontpage-api/company/'+this.$route.params.id)
				.then((response) => {
					var jsn = JSON.parse(response.data.json_data);
					this.hoorain.businessLogo = '/company-images/'+response.data.image;
					this.hoorain.businessName = response.data.name;
					this.hoorain.establishDate = response.data.establish_date;
					this.hoorain.ceo = jsn.ceo_of_the_company;
					this.hoorain.address.officeName = jsn.address;
					this.hoorain.mail = 'mailto:'+jsn.support_email;
					this.hoorain.emailName = jsn.support_email;
					this.hoorain.mobile = jsn.support_phone_number;
					this.hoorain.website = jsn.website;
					this.hoorain.products = response.data.products;
					this.hoorain.capacity = response.data.production_cap;
					this.hoorain.manpower = response.data.manpower;
					this.hoorain.textDetails.details = response.data.description;
					this.hoorain.social.facebook = jsn.facebook;




				});
		},
	};
</script>
