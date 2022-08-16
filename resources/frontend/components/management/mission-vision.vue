<template>
	<section class="mission-vision pb-16 angled upper-end">
		<div class="container">
			<div class="vision content-box">
				<h2 class="title">{{ vision.title }}</h2>
				<p>{{ vision.content }}</p>
			</div>
			<div class="mission content-box">
				<h2 class="title">{{ mission.title }}</h2>
				<p>{{ mission.content }}</p>
			</div>
			<div class="objective content-box">
				<h2 class="title">{{ objective.title }}</h2>
				<p>{{ objective.content }}</p>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/mission-vision';
</style>

<script>
	export default {
		data() {
			return {
				mission: {
					title: 'Our Mission',
					content:
						'We view business as a means to the material and social well being of the investors, employees at large leading to accretion of wealth through financial and moral gains as a part of the process of development of civilization.',
				},
				vision: {
					title: 'Our Vision',
					content:
						'Our mission is to produce and provide quality services and un innovative products for people, maintain ethical slandered in business operation, also ensuring benefit to the stakeholders and peoples of Bangladesh.',
				},
				objective: {
					title: 'Our Objective',
					content:
						'to accomplish our vision and Mission we are constantly parsing for besetment of socio-economic life of our people.',
				},
			};
		},
		components: {},
	};
</script>
