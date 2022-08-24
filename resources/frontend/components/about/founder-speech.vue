<template>
	<section class="founder pb-28 pt-32">
		<div class="quote">
			<div class="container">
				<div
					class="flex flex-col xl:flex-row justify-center items-center py-4">
					<div class="xl:basis-2/4">
						<img
							:src="'/profile-images/' + quote.imgSrc"
							:alt="quote.alt"
							class="w-7/12 mx-auto rounded shadow-2xl" />
					</div>
					<div class="xl:basis-2/4 mt-8 xl:mt-0">
						<blockquote
							class="text-3xl xl:text-5xl xl:w-3/4 leading-tight">
							{{ quote.quote }}
						</blockquote>
						<cite class="block text-lg pt-2">
							{{ quote.cite }}
						</cite>
						<span clsas="py-2">{{ quote.status }}</span>
					</div>
				</div>
			</div>
		</div>

		<div class="py-16 lg:py-28">
			<div class="container">
				<div class="about-founder">
					<h2>{{ FounderDetails.title }}</h2>
					<p>
						{{ FounderDetails.description }}
					</p>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	.about-founder {
		@apply text-center py-4 overflow-hidden;

		h2 {
			@apply text-4xl text-gray-800 font-bold pb-6;
		}

		p {
			@apply xl:w-10/12 mx-auto text-gray-400;
		}
	}

	.quote {
		@apply pb-8 pt-12;
	}
</style>

<script>
	import breadcrumb from '../../components/global/breadcrumb';
	export default {
		data() {
			return {
				FounderDetails: {},
				quote: {},
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
		components: {
			breadcrumb,
		},
	};
</script>
