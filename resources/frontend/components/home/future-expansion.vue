<template>
	<section class="py-12">
		<div class="container">
			<div class="grid lg:grid-cols-2">
				<div class="overflow-hidden lg:order-1 order-2">
					<h2
						class="mb-4 text-gray-800 font-bold lg:text-4xl text-2xl">
						{{ fe.top.title }}
					</h2>
					<p class="text-gray-400 leading-loose mb-6">
						{{ fe.top.desc }}
					</p>
					<div class="grid grid-rows-3 lg:grid-flow-col">
						<div
							class="py-4 transition-all transform translate-x-0 hover:translate-x-1"
							v-for="(item, key) in fe.list"
							:key="key">
							<span
								class="inline-block py-2 px-4 mr-4 text-xs font-semibold bg-red-500 text-white rounded">
								{{ key }}
							</span>
							<span>{{ item.name }}</span>
						</div>
					</div>
				</div>
				<div
					class="w-ful px-3 order-0 lg:order-2 order-1 mb-12 md:mb-0">
					<img
						src="/frontend/images/contents/expensions.svg"
						alt=""
						class="sm:max-w-sm lg:max-w-full mx-auto" />
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	export default {
		name: 'future expension',
		data() {
			return {
				fe: {
					top: {
						title: '',
						desc: '',
					},
					list: [],
				},
			};
		},

		mounted() {
			axios
				.get(
					window.location.origin +
						'/frontpage-api/future-expansion-data'
				)
				.then((response) => {
					(this.fe.top.title = response.data.top.title),
						(this.fe.top.desc = response.data.top.desc),
						(this.fe.list = response.data.list);
				});
		},
	};
</script>
