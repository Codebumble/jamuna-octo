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
					businessLogo: 'frontend/images/logo/hoorain.png',
					alt: 'image alt',
					companyName: 'Hoorain HTF',
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
								'HOORAIN HTF LTD. has emergedunder the dynamic entrepreneurship of Mr. Nurul Islam Babul – Honorable Chairman of JAMUNA Group and his highly qualified daughter Ms. Rozalin Islam – Honorable Managing Director with a mission to contribute for the esteemed and up growing Global Apparel Industry. It launched its maiden voyage in the year 2018 with the flag of a largest textile mill in the South East Asian region. It sailed along with the vision of a renaissance in this contemporary textile industry & added the group of ventures to strengthen its winningfleet consequently for a greater success of Bangladesh apparel industry.',
						},
						{
							details:
								'HOORAIN HTF LTD. as the Flagship of the Group with an aim to run at the highest degree of Business acumen, corporate governance and commitment to the social and global facets from the deck of it to contribute at the highest rate to meet the global standards.',
						},
						{
							details:
								'HOORAIN HTF LTD. HOORAIN HTF LTD. is going to be one of the best-woven textile manufacturers in BANGLADESH that will perform as a highest exporter for the entire range of fashion all over in EUROPE, USA, SCANDINEVIAN REGION, AUSTRALIA & ASIAN market with its innovations and varieties of products. We have a target to develop with the stream of time by meeting the significant ever-changing trends of fashion of the current era. With the rhythm of the enlightenment of postmodern lifestyle covering last 20 years, we are walking with the light, attaining the innovations of time and developing ourselves everyday – every moment. HOORAIN family is dedicated to facilitate all of its clients with the promise of best possible quality, improved service and competitive price for all kinds of woven textile solutions with a capacity of 9 million yards/month with a state of art machineries and set up.',
						},
						{
							details:
								'Our focus is to make an eco-friendly lifestyle for our consumers all over the world, as HOORAIN takes a motto “AN ART OF ECO LIFE” with a discharge system enhanced by 100% Biological ETP powered by Italian state of art machinery set up to ensure the promise of sustainability towards nature and environment.',
						},
					],
				},
			};
		},
	};
</script>
