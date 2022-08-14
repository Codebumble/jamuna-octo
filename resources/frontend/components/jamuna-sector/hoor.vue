<template>
	<businessDetails :data="hoor" />
</template>

<script>
	import businessDetails from '../global/business-details';
	export default {
		components: {
			businessDetails,
		},
		data() {
			return {
				hoor: {
					businessLogo: '/frontend/images/logo/hoor.png',
					alt: 'image alt',
					objectfit: false, //For logo size responsiveness
					companyName: 'Hoor',
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
								'To begin with Hoor is just not a name, a clothing line or a brand. It’s an identity, a belief system and a self-projecting statement. Made with high- end fabric advancements, Hoor comes as 3 piece luxury lawn collections that enclose trendy elegance and timeless tradition.  Hoor boasts of cutting edge embroidery which fuses tradition and modern class in designs that are sure to be the perfect essence for your summer occasions.',
						},
						{
							details:
								'The true essence of Hoor comes from none other than the talented mind of one of the youngest billionaires in the country Sumaiya Rozalin Islam, Director Jamuna Group. She envisioned the pure beauty in the heavenly literature of Hoors. Thus bringing in the best in the industry artisans and resources, she sculptured that vision into Hoor, the brand.',
						},
						{
							details:
								'<span class="font-bold block">Ideology behind Hoor:</span>"Time travels the heaven and earth and within this harmony lies Gods greatest creations. Life as we say starts with heaven into its most beautiful creation Art. And that concept expands its wings into an extravagant portrayal of beauty otherwise known as Hoor. Keeping this ideology consistent we bring you not just a brand but a self-projecting statement. Hoor caters to the beauty that lies in all of us and I believe together we will move ahead with this beautiful philosophy."',
						},
						{
							details:
								'Garment production consists of many sequential processes beginning  from converting raw materials into finished products in an organized manner. HOOR’s production house does everything from scratch starting from making loose fibers till the finished product everything is being done under one roof.',
						},
						{
							details:
								'HOOR has an exotic collection of salwar suits in variant of shades being offered to our customers. It sets a benchmark for providing top quality clothing using 100% of cotton, viscos, linen in making the products. On top of all that HOOR offers the highest quality embroidery apparels and digital print clothing that beams vibrant colours. We are promising quality products with the best price, better than any other brand that has to offer in Bangladesh.',
						},
						{
							details:
								'Ready to wear apparel involves many processing steps, beginning with the idea or designing a concept and ending with a finished product. HOOR has a diverse range of fabric that looks high-end yet affordable based on our customers. This spring season we would mainly focus on floral patterns and hues with a pop of some colors. Here, designs are mainly designed to maintain the elegance of our individual clients and have a custom stitch as per their measurements.  Moreover, the fabric is selected very thoughtfully that the pattern and prints may add a little life to the whole piece.',
						},
					],
				},
			};
		},
	};
</script>
