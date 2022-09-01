<template>
	<section class="contact pb-8 pt-32">
		<div class="container pb-8">
			<div class="flex flex-col items-center">
				<div class="content w-full mb-6">
					<h2 class="text-4xl font-bold text-center">
						{{ contents.title }}
					</h2>
				</div>
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
