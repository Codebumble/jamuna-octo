<template>
	<section
		id="cb-hero-bg"
		class="overflow-hidden cb-hero relative py-8 bg-slate-100">
		<div class="container">
			<div
				class="flex flex-col justify-center items-center text-gray-800">
				<h2
					class="lg:text-5xl text-2xl font-bold lg:leading-tight leading-snug lg:mb-3 text-center text-gray-800">
					{{ data.pageTitle }}
				</h2>
				<p
					class="md:text-base xs:text-sm xl:w-3/5 text-center text-gray-400">
					{{ data.pageDesc }}
				</p>
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
</style>

<script>
	export default {
		name: 'breadcrumb',
		props: {
			data: Object,
		},
	};
</script>
