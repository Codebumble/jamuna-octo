<template>
	<section class="company-profile pb-16 angled upper-end">
		<div class="container">
			<div class="description">
				<p
					v-for="(description, key) in descriptions"
					:key="key">
				{{ description.value }}
				</p>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/company-profile';
</style>

<script>
	export default {
		data() {
			return {
				descriptions: [
					{
						value: 'As an evolving private company that has continually grown within the competitive industry in Bangladesh, Jamuna Group possesses high values, but the most crucial value of the company is its human resource and the Managing Director, Mr. Md. Nurul Islam. The name, Jamuna group is inseparably associated with the name of Mr. Md. Nurul Islam, an architect a pioneer ultimately an Industrial leader in the private sector. He heralded the Jamunas appearance in the arena of private industrial sector in 1974 with the mission and vision of building newly independent Bangladesh as a happy and prosperous country. Jamuna started its journey with the Jamuna Electric Manufacturing Co. Ltd in 1974 and it pioneered the manufacturing electrical accessories and fittings in Bangladesh since 1975. There after JGI flourished as a giant conglomerates as shown in the chronology.',
					},
					{
						value: 'To maintain its competitiveness in todays globalized modern market, Jamuna introduced the best technology along with machinery and expertise in Bangladesh. Jamuna developed and expanded its enterprises of multi-dimension for diversifying its product range. In course of 34 years of operation Jamuna Group expanded into a giant dynasty of 24 large scale enterprises.',
					},
					{
						value: 'From textile to real estate � Jamuna Group has diverse business interests. Over the thirty four years of operation, the Group has ventured into electrical, engineering, chemical, leather, garments and textiles- including spinning, knitting and dyeing, cosmetics, toiletries, beverages, real estate, housing, print and electronic media sectors.',
					},
					{
						value: 'Jamuna has a strong goodwill for its products and operation in both local and global market. It is imperative to point out that Jamuna has built up a new World of textile with the best technology and machinery imported from Germany, Switzerland, USA, Japan, India, Italy etc. for producing the best quality products for the global market.',
					},
					{
						value: 'Jamuna has diversified its business from manufacturing to media industry. One of the most significant and powerful subsidiary of Jamuna Group is THE DAILY JUGANTOR, which is one of the leading newspaper of Bangladesh. The Jugantor is the rare achievement of the Group, with the motive to protect human rights and provide true and fair news to the nation. It has occupied the heart of the common people of Bangladesh by championing their grievances and upholding their democrative rights pro-people, responsible and transparent journalism is its inherent philosophy and guiding force for playing a role of the BECON STAR in the world of the print media.',
					},
					{
						value: 'Jamuna group is also involved real estate development and one of the biggest project it has undertaken is The Future Park. The project is located at Baridhara, Dhaka on 33 acres of land. The Future park is emerging as a centre of excellence for premier cluster of large scale enterprises like most lucrative and an aesthetic biggest shopping mall cum commercial complex in Asia, a modern television building (centre) a modern 500 beds Hospital, a Five Star Hotel etc in the same premises.',
					},
				],
			};
		},
		components: {},
	};
</script>
