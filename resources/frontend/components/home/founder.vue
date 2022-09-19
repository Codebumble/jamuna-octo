<template>
	<section class="founder py-16">
		<div class="quote">
			<div class="container">
				<div class="title mb-8">
					<h2 class="text-2xl lg:text-4xl text-gray-800 font-bold uppercase text-center">
						A dreamer who chiseled his dreams
					</h2>
				</div>
				<div
					class="
						flex gap-4 justify-center items-center flex-col xl:flex-row
					">
					<div class="yt basis-4/2">
						<iframe
						:src="ytSrc"
						frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
						allowfullscreen
						class="rounded-md xl:w-[37rem] h-56 xl:h-80 w-80"></iframe>
					</div>
					<div class="md:w-8/12 min-h-[250px] basis-4/2 py-4 px-8 xl:ml-4">
						<blockquote
							class="text-2xl xl:text-3xl xl:w-3/4 leading-tight">
							{{ quote.quote }}
						</blockquote>
						<cite class="block text-lg pt-2">
							{{ quote.cite }}
						</cite>
						<span class="py-2">{{ quote.status }}</span>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
.quote {
	@apply pb-8 pt-12;
}
</style>

<script>
export default {
	data() {
		return {
			quote: {},
			ytSrc:'https://www.youtube.com/embed/Kaat7BzcEI0'
		};
	},
	mounted() {
		axios
			.get(window.location.origin + '/founder-api/founder-speech')
			.then((response) => {
				this.FounderDetails = response.data.FounderDetails;
				this.quote = response.data.quote;
			});
	},
};
</script>
