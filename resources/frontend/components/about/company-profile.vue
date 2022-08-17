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
			<div class="content-box">
				<h2 class="title">{{ awards.title }}</h2>
				<h4 class="subtitle">{{ awards.subtitle }}</h4>
				<p v-for="award in awards.contents">{{ award.value }}</p>
			</div>
			<div class="content-box">
				<h2 class="title">{{ hdrCorporate.title }}</h2>
				<p>{{ hdrCorporate.desc }}</p>
				<h4 class="subtitle">{{ hdrCorporate.subtitle }}</h4>
				<p v-for="content in hdrCorporate.contents">
					{{ content.value }}
				</p>
			</div>
			<div class="content-box">
				<h2 class="title">{{ environment.title }}</h2>
				<p>
					{{ environment.content }}
				</p>
			</div>
			<div class="content-box">
				<h2 class="title">{{ goals.title }}</h2>
				<p v-for="goal in goals.contents">
					{{ goal.value }}
				</p>
			</div>
			<div class="content-box">
				<h2 class="title">{{ activities.title }}</h2>
				<p v-for="activity in activities.contents">
					{{ activity.value }}
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
						value: 'From textile to real estate Jamuna Group has diverse business interests. Over the thirty four years of operation, the Group has ventured into electrical, engineering, chemical, leather, garments and textiles- including spinning, knitting and dyeing, cosmetics, toiletries, beverages, real estate, housing, print and electronic media sectors.',
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
				awards: {
					title: 'Awards',
					subtitle:
						'Best recipient of National and International awards',
					contents: [
						{
							value: 'Shameem Composite Mills Limited received National Export Trophy, Gold award in 2000-2001.',
						},
						{
							value: 'Shameem Spinning Mills Limited received National Export Trophy, Silver award in 1998-1999.',
						},
						{
							value: 'Jamuna Knitting & Dyeing Limited received National Export Trophy, Bronze award in 1998-1999.',
						},
						{
							value: 'Jamuna Builders Limited wins Better Building better Winning Competition 2002 of Scan Cement (Heidelberg Cement Group).',
						},
						{
							value: 'Jamuna Knitting & Dyeing Limited got an award from Miles Handle Sgesellschaft International MBH & Co., Germany',
						},
					],
				},
				hdrCorporate: {
					title: 'HRD & Corporate Governance',
					subtitle:
						'Managing Director, Mr Md. Nurul Islam Babul, considers Jamuna Group team to be',
					desc: 'Jamuna Group recognizes the importance of staff as true ‘Human Resources’; valuable assets that contribute to the continuing growth of the company. By placing emphasis on personnel at every level of the business, we hope to encourage a true team spirit.',
					contents: [
						{
							value: '“…a quality of people who understand the dynamics of the industry; that have enough experience in the industry to anticipate what the competitors are doing and still have a loyalty with the customers. They are the people who are really laying down the touchstones for this business.”',
						},
						{
							value: 'Jamuna Group’s philosophy recognizes these people as the key element of the business and we aim to be the employer of choice in our industry.',
						},
					],
				},
				environment: {
					title: 'Environment: We Care',
					content:
						'At Jamuna, sustainability means managing business in a way that balances environmental, social and economic impacts. This psychology is built on the companys commitment to ensure its operations remain sustainable in the longer-term.',
				},
				goals: {
					title: 'Our Goal',
					contents: [
						{
							value: 'Apply more sustainable practices in our operation; and Educate its employees and customers about how they can make a difference.',
						},
						{
							value: 'Jamuna is environment friendly. We are very much careful about our environment so that water and flora fauna around us are not adversely affected.',
						},
					],
				},
				activities: {
					title: 'Nation building activities',
					contents: [
						{
							value: 'We participate in our nation building activities, we have a big contribution towards the national exchequer in the form of taxes and by generating employment opportunities for huge number of unemployed work forces. Jamuna Group is one of the biggest employers.',
						},
					],
				},
			};
		},
		components: {},
	};
</script>
