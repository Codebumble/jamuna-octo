<template>
	<businessDetails :data="jeansco" />
</template>

<script>
	import businessDetails from '../global/business-details';
	export default {
		components: {
			businessDetails,
		},
		data() {
			return {
				jeansco: {
					businessLogo: '/frontend/images/logo/hoor.png',
					alt: 'image alt',
					objectfit: false, //For logo size responsiveness
					companyName: 'Jeans & Co.',
					establishDate: '01/01/2022',
					ceo: 'Alex',
					address: {
						officeName: 'Jamuna Television LTD',
						officeRoad: 'KA-244 Jamuna Future Oark Complex',
						location: 'Pragati Ave, Dhaka - 1229',
						country: 'Bangladesh',
					},
					mail: 'mailto:hello@codebumble.net',
					emailName: 'Hello Codebumble',
					mobile: 'tel:+880123456789',
					website: 'http://www.hoorainhtf.com/',
					social: {
						facebook: '#',
						instagram: '#',
						linkedin: '#',
					},
					textSummary: true,
					textDetails: [
						{
							details:
								'With Jamuna Denim acing the denim export in Bangladesh, the visionary Sumaiya Rozalin wanted to cater the local Bangladeshi market with International standard denim garments. Thus JEANS&CO came into existence with a strong line of Designer Denim and non-denim garments. The brand has a wide variety of clothing categories including casual-wear ethnic-wear, and party-wear for men, women, and children.',
						},
					],
				},
			};
		},
	};
</script>
