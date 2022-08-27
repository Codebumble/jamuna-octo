<template>
	<section class="py-10 bg-slate-50">
		<div class="container">
			<div
				class="flex flex-col lg:flex-row gap-8 justify-between py-4 items-center">
				<div class="lg:basis-2/4">
					<h2
						class="font-bold text-2xl lg:text-4xl text-gray-800 leading-snug text-center lg:text-left">
						{{ mvo.headingTitle }}
					</h2>
				</div>
				<div class="lg:basis-2/4">
					<p
						class="text-gray-400 leading-looset text-center lg:text-left">
						{{ mvo.headingDesc }}
					</p>
				</div>
			</div>
			<div class="grid lg:grid-cols-3 gap-8 pt-8">
				<div
					class="rounded bg-white hover:shadow-md shadow-sm transition-all transform translate-y-0 hover:-translate-y-1 text-center lg:p-12 p-4 mx-auto">
					<img
						class="h-36 mx-auto my-4"
						src="/frontend/images/contents/mission.svg"
						alt="mission" />
					<h3 class="mb-2 font-bold font-heading text-xl">
						{{ mvo.missionTitle }}
					</h3>
					<p
						class="text-sm text-gray-400 leading-relaxed pb-4 lg:pb-0">
						{{ mvo.missionDesc }}
					</p>
				</div>
				<div
					class="rounded bg-white hover:shadow-md shadow-sm transition-all transform translate-y-0 hover:-translate-y-1 text-center lg:p-12 p-4 mx-auto">
					<img
						class="h-36 mx-auto my-4"
						src="/frontend/images/contents/vision.svg"
						alt="mission" />
					<h3 class="mb-2 font-bold font-heading text-xl">
						{{ mvo.visionTitle }}
					</h3>
					<p
						class="text-sm text-gray-400 leading-relaxed pb-4 lg:pb-0">
						{{ mvo.visionDesc }}
					</p>
				</div>
				<div
					class="rounded bg-white hover:shadow-md shadow-sm transition-all transform translate-y-0 hover:-translate-y-1 text-center lg:p-12 p-4 mx-auto">
					<img
						class="h-36 mx-auto my-4"
						src="/frontend/images/contents/objective.svg"
						alt="mission" />
					<h3 class="mb-2 font-bold font-heading text-xl">
						{{ mvo.objectiveTitle }}
					</h3>
					<p
						class="text-sm text-gray-400 leading-relaxed pb-4 lg:pb-0">
						{{ mvo.objectiveDesc }}
					</p>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	export default {
		name: 'mission vission',
		data() {
			return {
				mvo: {
					headingTitle: 'Our Mission Vision & Objective',
					headingDesc:
						'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus eget justo et iaculis. Quisque vitae nulla malesuada, auctor arcu vitae, luctus nisi. Sed elementum vitae ligula id imperdiet.',
					missionTitle: 'Our Mission',
					missionDesc:
						'We view business as a means to the material and social well being of the investors, employees at large leading to accretion of wealth through financial and moral gains as a part of the process of development of civilization.',
					visionTitle: 'Our Vision',
					visionDesc:
						'Our mission is to produce and provide quality services and un innovative products for people, maintain ethical slandered in business operation, also ensuring benefit to the stakeholders and peoples of Bangladesh.',
					objectiveTitle: 'Our Objective',
					objectiveDesc:
						'to accomplish our vision and Mission we are constantly parsing for besetment of socio-economic life of our people.',
				},
			};
		},
	};
</script>
