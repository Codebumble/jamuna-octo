<template>
	<section class="contact pb-8 pt-32">
		<div class="container pb-8">
			<div class="text-center pb-12">
				<h2
					class="font-bold text-2xl lg:text-3xl text-gray-800 underline decoration-2 decoration-solid decoration-gray-800 underline-offset-[1rem]">
					{{ contents.title }}
				</h2>
			</div>
			<div class="main-content">
				<span
					class="date font-bold text-xs inline-block mb-4 text-center underline decoration-wavy decoration-gray-800 underline-offset-4"
					>Last Update: {{ contents.time }}</span
				>
				<div
					class="mb-4"
					v-html="contents.content"></div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	.date {
		text-align: center;
		display: block;
		margin-bottom: 2rem;
	}

	h1,
	h2,
	h3,
	h4,
	h5 {
		@apply pb-2 text-2xl font-bold;
	}

	p {
		@apply mb-4;
	}
</style>

<script>
	export default {
		mounted() {},
		props: { contents: Object },
	};
</script>
