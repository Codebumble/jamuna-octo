<template>
	<section class="growthHistory pb-16">
		<div class="container relative">
			<div class="timeline">
				<ul>
					<li
						class="item"
						v-for="timeline in growthHistory">
						<div class="content">
							<div class="heading">
								<h4 class="step">{{ timeline.year }}</h4>
							</div>
							<div class="main-content">
								<p>
									{{ timeline.description }}
								</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_growth';
</style>

<script>
		export default {
			data() {
				return {
					growthHistory: [
						{
							year: '1974',
							description: `The Group came into being.

							Mr.M.Nurul Islam, the architect of the Group, took up the challenge of bringing necessary technologies to Bangladeshi companies aiming to offset the bulk of foreign imports. His bold entrepreneurial spirit, progressive ideas and untiring efforts along with the devoted services of his colleagues, laid the strong foundation for success and future developments.`,
						},
						{
							year: '1975',
							description: `The first flagship enterprise of the Group, Jamuna Electric Manufacturing Co. Ltd. started operation. It pioneered the manufacturing of electrical accessories and fittings in Bangladesh. It is also producing PVC-compound and pipes.`,
						},
						{
							year: '1978',
							description: `Jamuna Electric & Engineering Industries Ltd. was established to produce ceiling fans, exhaust fans and ballasts.

	`,
						},
						{
							year: '1980',
							description: `Jamuna stepped into domestic production of high and low voltage cabbies and conductors though the inception of Jamuna Cables & rubber Industries.

	`,
						},
						{
							year: '1982',
							description: `Jamuna Wires was established to produce super enameled copper wires.

	`,
						},
						{
							year: '1988',
							description: `Jamuna Distillery Ltd. was launched for preparation of industrial and pharma alcohol, thereby making the Group�s entry into the chemical sector of the country. Presently, Jamuna Distillery Ltd. claims wide expertise in the chemical sector.`,
						},
						{
							year: '1992',
							description: `The Group entered into the footwear industry with Pegasus Shoes Ltd. Product line of the company includes leather shoes, sports shoes, sandals and sneakers. With a view to provide boost to the local shoe industry and meet external demand of leather, Pegasus Leather Processing Unit was set up for producing finished leathers from natural crust leathers.

							Jamuna Knitting & Dyeing Ltd. made its entry into the textiles sector as a Composite Unit with knit fabrics, dyeing, finishing, printing and ready made garments.
							Jamuna Welding Electrode Ltd. started production of are welding electrodes.
							Rubicon Advertising was launched for nationwide advertising in different media to support its own brands and to service outside organizations as well.`
						},
						{
							year: '1993',
							description: `The Group started its most ambitious venture in the cosmetics industry with Aromatic Cosmetics Ltd. which produces cosmetics and toiletries under the Aromatic� brand name.`
						},
						{
							year: '1996',
							description: `Establishment of Shameem Spinning Mills Ltd. for production of knit yarn opened a new frontier in the textile technology for the Group.`
						},
						{
							year: '1997',
							description: `Pegasus Leathers Ltd. was set up for production of PVC and PU coated synthetic leather.`
						},
						{
							year: '1998',
							description: `Shameem composite Mills Ltd. came into being to produce ring spun yarn.`
						},
						{
							year: '1999',
							description: `Jamuna Printing & Publishing Ltd. made its entry into publication sector by publishing The Daily Jugantor in 2000
							The Group�s housing venture started with Jamuna Builders Ltd. which has already given shape to the project of building Asia�s biggest shopping and commercial complex-Jamuna Future Park, developing a large residential township-New Uttara Model Town, and a mega real estate venture-Jamuna City.`
						},
						{
							year: '2000',
							description: `Production of open-end yarn started through the establishment of Shameem Rotor Spinning Ltd.`
						},
						{
							year: '2002',
							description: `Jamuna Media Ltd. was set up and entrusted with the sales and distribution of The Daily Jugantor. The newspaper having thus emerged, soon managed to attract wide readership throughout the country. It is printed and published by Jamuna Printing & Publishing Ltd.
							Jamuna Spinning Mills Ltd. was established to produce ring spun yarn.
							Shameem Garments Ltd. was set up for production of export oriented ready made garments.
							Jamuna Television Ltd. was formed to operate a terrestrial and satellite TV channel.`
						},
						{
							year: '2004',
							description: `Crown Beverage Ltd. was set up for production of non-alcoholic malt beverage and drinks.`
						},
						{
							year: '2005',
							description: `Jamuna Denims Ltd. (Weaving Unit)came into being as a Composite Unit for production of open-end yarn, denim fabrics and ready made garments.`
						},
						{
							year: '2006',
							description: `Jamuna Denims Ltd. (Garments Unit) came into being as a Garments Unit for production of ready made garments`
						},
						{
							year: '2009',
							description: `With the advent of Denim revolution around the world, Optimo Jeans was registered and launched in order to cater the massive increase in demand globally
							Jamuna Bashundhara Housing Limited is a vast well integrated housing establishment targeted towards a niche audience. The full plan has garnered much noise in the real estate industry around the country.`
						},
						{
							year: '2013',
							description: `Jamuna extended their business line towards a more horizontal direction and landed their first Food venture, Jamuna Food Ltd.
							One of the landmarks in the country, Jamuna Future Park built on a complex with area of more than 36 acres, holds the biggest 6 storied shopping mall with each floor size 440,000 sqft. The mall has every single amenities that takes Bangladesh in the world map. Late Founder Md. Nurul Islam believed Jamuna Future Park may what Urban Bangladesh needed towards a better future.`
						},
						{
							year: '2014',
							description: `Jamuna widened their production unit and evolved in Jamuna Electronics and Automobiles Ltd. The first High – Tech Motorbikes came into assembly line and subsequently into production.`
						},
						{
							year: '2015',
							description: `Late Founder MD. Nurul Islam saw the massive demand in the automobile accessories industry and envisioned a the biggest Tyre production unit in the country and thus founded Jamuna Tyre and Rubber Ind. Ltd.`
						},
						{
							year: '2017',
							description: `In order to suffice massive power intakes in our industrial facilities and Shopping Mall our managing director deployed Jamuna Power Ltd.
							In order to suffice massive power intakes in our industrial facilities and Shopping Mall our managing director deployed Jamuna Power Ltd.
							With the Hospitality business booming in the country Jamuna tagged with foreign counterparts in vision to develop Jamuna Hotels and Resorts.

							Monika Nazneen Islam, Group Director registered both Jamuna Glass Ind. Ltd. And Jamuna Gas Ltd.

							Same year Jamuna paper mills got registered as well.`
						},
						{
							year: '2018',
							description: `HOORAIN HTF LTD. has emergedunder the dynamic entrepreneurship of Mr. Nurul Islam Babul – Honorable Chairman of JAMUNA Group and his highly qualified daughter Ms. Rozalin Islam – Honorable Managing Director with a mission to contribute for the esteemed and up growing Global Apparel Industry. It launched its maiden voyage in this year with the flag of a largest textile mill in the South East Asian region. It sailed along with the vision of a renaissance in this contemporary textile industry & added the group of ventures to strengthen its winningfleet consequently for a greater success of Bangladesh apparel industry.`
						},
						{
							year: '2019',
							description: `Wholesale Club is the one and only HYPERMARKET in Bangladesh In consideration with the huge space size of about 1,50,000 sqft area, products’ variety and products’ quantity, it is the largest in its kind in the region.
							Lawn Processing ltd. aas registered in this year to cater the female ready garments market in the country.`
						},
						{
							year: '2020',
							description: `Hoor was launched in early part of the year. Hoor has an exotic collection of salwar suits in variant of shades being offered to our customers. It sets a benchmark for providing top quality clothing using 100% of cotton, viscos, linen in making the products.`
						}
					],
				}
			},
			components: {},
			mounted() {
				let items = document.querySelectorAll('.timeline li');

				function elementInViewport(el) {
					let rect = el.getBoundingClientRect();
					return (
						rect.top >= 0 &&
						rect.left >= 0 &&
						rect.bottom <=
							(window.innerHeight ||
								document.documentElement.clientHeight) &&
						rect.right <=
							(window.innerWidth ||
								document.documentElement.clientWidth)
					);
				}

				function viewport() {
					for (let i = 0; i < items.length; i++) {
						if (elementInViewport(items[i])) {
							items[i].classList.add('active');
						}
					}
				}

				// listen for events
				window.addEventListener('load', viewport);
				window.addEventListener('resize', viewport);
				window.addEventListener('scroll', viewport);
			},
		};
</script>
