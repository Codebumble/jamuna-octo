<template>
	<section class="py-10 bg-slate-50">
		<div class="container">
			<div
				class="flex flex-col lg:flex-row gap-8 justify-between py-4 items-center">
				<div class="lg:basis-2/4">
					<h2
						class="font-bold text-2xl lg:text-4xl text-gray-800 leading-snug text-center lg:text-left">
						{{ top.headingTitle }}
					</h2>
				</div>
				<div class="lg:basis-2/4">
					<p
						class="text-gray-400 leading-looset text-center lg:text-left">
						{{ top.headingDesc }}
					</p>
				</div>
			</div>
			<div class="grid lg:grid-cols-3 gap-8 pt-8">
				<div
					class="rounded bg-white hover:shadow-md shadow-sm transition-all transform translate-y-0 hover:-translate-y-1 text-center lg:p-12 p-4 mx-auto"
					v-for="data in mvo"
					:key="data">
					<img
						class="h-36 mx-auto my-4"
						:src="data.src"
						alt="mission" />
					<h3 class="mb-2 font-bold font-heading text-xl">
						{{ data.title }}
					</h3>
					<p
						class="text-sm text-gray-400 leading-relaxed pb-4 lg:pb-0">
						{{ data.desc }}
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
				top: {
					headingTitle: '',
					headingDesc: '',
				},
				mvo: [
					{
						src: '/frontend/images/contents/mission.svg',
					},
					{
						src: '/frontend/images/contents/vision.svg',
					},
					{
						src: '/frontend/images/contents/objective.svg',
					},
				],
			};
		},
		created() {
			axios
				.get(
					window.location.origin +
						'/frontpage-api/mission-vision-frontpage'
				)
				.then((response) => {
					this.top = {
						headingTitle: response.data.top.header,
						headingDesc: response.data.top.h_description,
					};
					response.data.data.forEach((item, index) => {
						this.mvo[index] = {
							...this.mvo[index],
							title: item.title,
							desc: item.desc,
						};
					});
				});
		},
	};
</script>
