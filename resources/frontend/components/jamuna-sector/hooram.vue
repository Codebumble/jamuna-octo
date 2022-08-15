<template>
	<businessDetails :data="hooram" />
</template>

<script>
	import businessDetails from '../global/business-details';
	export default {
		components: {
			businessDetails,
		},
		data() {
			return {
				hooram: {
					businessLogo: '/frontend/images/logo/hoor.png',
					alt: 'image alt',
					objectfit: false, //For logo size responsiveness
					businessName: 'Hooram by Hoor Muskan',
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
					products: 'Ready made garments',
					capacity: '30,000 pcs RMG per day',
					manpower: '1800',
					social: {
						facebook: '#',
						instagram: '#',
						linkedin: '#',
					},
					textSummary: true,
					textDetails: {
						details:
							'<p>After the massive success of Hoor’s lawn garment in the urban market, Jamuna Group took up the growth strategy of spreading high quality lawn to different parts of the country, both urban and rural market place alike. Thus Hooram, the wholesale wing of Hoor shaped into reality.</p><p>For the first time in Bangladesh, hand penned designs with exotic colors are printed into high quality fabrics and distributed nationally. Hooram, as stated by the visionary mind Sumaiya Rozalin Islam is the next level of clothing evolution in Bangladesh.</p>',
					},
				},
			};
		},
	};
</script>
