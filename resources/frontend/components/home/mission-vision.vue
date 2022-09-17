<template>
	<section class="py-10 bg-slate-50">
		<div class="container">
			<div class="grid lg:grid-cols-3 gap-8">
				<div
					class="rounded bg-white hover:shadow-md shadow-sm transition-all transform translate-y-0 hover:-translate-y-1 text-center lg:p-12 p-4 mx-auto border-b-4 border-red-600"
					v-for="data in mvo"
					:key="data">
					<img
						class="h-12 mx-auto my-4"
						:src="'/frontend/images/contents/' + data.src"
						:alt="data.title" />
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
				mvo: [],
			};
		},
		created() {
			axios
				.get(
					window.location.origin +
						'/frontpage-api/mission-vision-frontpage'
				)
				.then((response) => {
					this.mvo = response.data.data;
				});
		},
	};
</script>
