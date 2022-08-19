<template>
	<section
		id="cb-hero-bg"
		class="overflow-hidden cb-hero relative py-8 bg-slate-100">
		<div class="container">
			<div
				class="flex flex-col justify-center items-center text-gray-800">
				<h2
					class="lg:text-3xl text-xl font-bold lg:leading-tight leading-snug lg:mb-3 text-center text-gray-800">
					{{ data.eventTitle }}
				</h2>
				<p
					class="md:text-base xs:text-sm xl:w-3/5 text-center text-gray-400">
					By <span class="font-bold">{{ data.by }}</span> in
					{{ data.location }}
				</p>
				<div class="pt-4">
					<span class="category">{{ data.category }}</span>
					<span class="time">{{ data.time }}</span>
				</div>
			</div>
		</div>
	</section>
	<section class="businessDetails pb-20 angled upper-end">
		<div class="container">
			<div class="">
				<div
					class="w-full rounded-md shadow-lg border border-slate-100 p-8 overflow-hidden businessDetails">
					<p v-html="data.detail"></p>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	.cb-hero {
		&#cb-hero-bg {
			@apply h-96;
			.justify-center {
				@apply h-80;
			}
		}
	}
	.category {
		&::after {
			content: '';
			@apply lg:inline-block w-1.5 h-1.5 rounded-full lg:mx-7 bg-gray-500;
		}
	}
	.time {
		@apply text-gray-500 block lg:inline-block;
	}
</style>

<script>
	export default {
		props: {
			data: Object,
		},
	};
</script>
