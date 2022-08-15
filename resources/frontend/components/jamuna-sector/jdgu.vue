<template>
	<businessDetails :data="jdgu" />
</template>

<script>
	import businessDetails from '../global/business-details';
	export default {
		components: {
			businessDetails,
		},
		data() {
			return {
				jdgu: {
					businessLogo: 'frontend/images/logo/hoorain.png',
					alt: 'image alt',
					objectfit: true, //For logo size responsiveness
					businessName: 'Jamuna Denims Garments LTD',
					establishDate: '01/01/2022',
					ceo: 'Alex',
					address: {
						officeName: 'Jamuna Denims Garments LTD',
						officeRoad: '',
						location: 'Konabari, Gazipur',
						country: 'Bangladesh',
					},
					mail: 'mailto:hello@codebumble.net',
					emailName: 'Hello Codebumble',
					mobile: 'tel:+880123456789',
					mobileLabel: '+880123456789',
					website: 'http://www.hoorainhtf.com/',
					products: 'Ready made garments',
					capacity: '30,000 pcs RMG per day',
					manpower: '1800',
					social: {
						facebook: '#',
						instagram: '#',
						linkedin: '#',
					},
					textDetails: [
						{
							details:
								'One of the recent additions to Jamuna Group is Jamuna Denims Garments Ltd., which started its operation in 2002. Jamuna Denims Garments Ltd., has state-of-the-art equipment sourced from renowned foreign manufacturers of garments machinery. Strict quality control measures are applied for flawless cutting, fusing, finishing and packing.',
						},
					],
					productList: [
						{
							name: 'Basic 5 Pocket Denim Long pant.',
						},
						{
							name: 'Ladies Stretch Denim Pant',
						},
						{
							name: 'Girls Denim Capri (with emb.)',
						},
						{
							name: 'Kids Denim Pant (print&emb)',
						},
						{
							name: 'Three pcs baby dress',
						},
						{
							name: "Denim long sleeve jacket(Men's & women's)",
						},
						{
							name: "Men's 5 Pocket Twill Long Pant",
						},
						{
							name: 'Ladies Denim Pant.',
						},
						{
							name: "Men's Bermuda short pant",
						},
						{
							name: 'Denim Babies mini skirt',
						},
						{
							name: 'Denim cargo Long Pant.',
						},
					],
					buyerList: [
						{
							name: "SARL CENTRAL'VET, 9 RUE DU",
						},
						{
							name: 'TE HA GE TEXTILHANDELS-GESELLSCHAFT GMBH.',
						},
						{
							name: 'CASSA DI RISPARMIO DI',
						},
						{
							name: 'BAY CITY TEXTILHANDELS GMBH',
						},
						{
							name: 'PARKWAY CONCEPT',
						},
						{
							name: 'EZ STREETWEAR CORP.',
						},
						{
							name: 'VETURA S.A.',
						},
						{
							name: 'ZEEMAN TEXTIELSUPERS B.V., DE',
						},
						{
							name: 'ALLPORT LTD., ALLPORT HOUSE',
						},
						{
							name: 'MULITEX LTD. 9/F, ANGEL TOWER',
						},
						{
							name: 'FRANCE SALES KNITWEAR',
						},
						{
							name: 'NOTHIN BUT NET CLOTHING, 13220',
						},
						{
							name: 'JENO NEUMAN ET FILS INC. 95',
						},
						{
							name: 'PROMTEX HANDELSGESELLSCHAFT',
						},
						{
							name: 'CGS INDUSTRIES, INC',
						},
						{
							name: 'ASEL TEKSTIL VE KONFEKSIYON SANAYI TICARET LTD.',
						},
						{
							name: 'PUBLI-ART SHIRT NV',
						},
						{
							name: 'DRESDNER HERRENMODE GMBH.',
						},
						{
							name: 'DISTRA WARENHABDELSGES. MBH',
						},
					],
				},
			};
		},
	};
</script>
