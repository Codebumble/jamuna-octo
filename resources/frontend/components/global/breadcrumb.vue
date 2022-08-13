<template>
	<section
		id="cb-hero-bg"
		class="overflow-hidden cb-hero relative py-8">
		<!-- <div class="gradient-overlay image"></div>
		<img
			:src="data.image"
			class="overlay image"
			:alt="data.alt" />
		<div class="container">
			<div class="flex flex-col justify-center text-white mt-6">
				<h2
					class="lg:text-5xl text-2xl font-bold lg:leading-tight leading-snug lg:mb-3">
					{{ data.pageTitle }}
				</h2>
				<p class="md:text-base xs:text-sm xl:w-3/5">
					{{ data.pageDesc }}
				</p>
			</div>
		</div> -->
		<div class="container">
			<div
				class="flex flex-col justify-center items-center text-gray-800">
				<h2
					class="lg:text-5xl text-2xl font-bold lg:leading-tight leading-snug lg:mb-3">
					{{ data.pageTitle }}
				</h2>
				<p class="md:text-base xs:text-sm xl:w-3/5 text-center">
					{{ data.pageDesc }}
				</p>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	.cb-hero {
		.gradient-overlay {
			@apply block absolute right-0 top-0 bottom-0 left-0;
			z-index: -1;
			background-image: linear-gradient(
				90deg,
				rgba(16, 7, 39, 1) 0%,
				rgba(16, 7, 39, 0.8) 25%,
				rgba(16, 7, 39, 0.6) 50%,
				rgba(16, 7, 39, 0.4) 100%
			);
		}

		.overlay {
			@apply w-auto h-full min-w-full min-h-full my-0 mx-auto block absolute top-0 right-0 bottom-0 left-0 object-cover box-border pointer-events-none opacity-95;
			// margin-left: 50vw;
			z-index: -2;
			&.image {
				object-position: center;
				object-fit: cover;
			}
		}
		&#cb-hero-bg {
			@apply h-80;
			.justify-center {
				height: 20rem;
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
