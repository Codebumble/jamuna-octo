<template>
	<breadcrumb :data="breadcrumb" />
	<section class="founder">
		<div class="bg-slate-50 py-8">
			<div class="container">
				<div class="about-founder">
					<h2>{{ FounderDetails.title }}</h2>
					<p>
						{{ FounderDetails.description }}
					</p>
				</div>
			</div>
		</div>

		<div class="quote container">
			<div
				class="flex flex-col xl:flex-row justify-center items-center py-4">
				<div class="xl:basis-2/4">
					<img
						:src="quote.imgSrc"
						:alt="quote.alt"
						class="w-3/4 mx-auto rounded-md shadow-2xl" />
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
	</section>
</template>

<style lang="scss">
	.about-founder {
		@apply text-center py-4 overflow-hidden;

		h2 {
			@apply text-4xl text-gray-800 font-bold pb-6;
		}

		p {
			@apply xl:w-10/12 mx-auto;
		}
	}

	.quote {
		@apply py-8;
	}
</style>

<script>
	import breadcrumb from '../../components/global/breadcrumb';
	export default {
		data() {
			return {
				breadcrumb: {
					image: 'https://codebumble.net/assets/images/contents/hero.jpg',
					alt: 'alt',
					pageTitle: 'Founder',
					pageDesc:
						'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum animi aliquam voluptates harum aspernatur eveniet velit doloribus aliquid adipisci suscipit?',
				},
				FounderDetails: {
					title: 'About Nurul Islam Bablu',
					description:
						'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi error placeat, iure sapiente nostrum quia temporibus in molestiae dicta voluptates modi exercitationem corrupti totam quidem quo. Hic vel veritatis quisquam perspiciatis dolor, earum dolorum quasi. Doloribus sunt inventore debitis maiores. Quas, veniam. Minus nobis, earum recusandae consectetur non dicta voluptas totam in eveniet neque assumenda iusto dolorem minima repellendus. Sunt.',
				},
				quote: {
					imgSrc: '/frontend/images/contents/Nurul_Islam_Babul.jpg',
					alt: 'alt',
					quote: 'A dreamer who chiseled his dreams into reality. Like a helion you lit up our world.',
					cite: 'Nurul Islam Bablu (3 May 1946 - 13 July 2020)',
					status: '@Founder of Jamuna Group',
				},
			};
		},
		components: {
			breadcrumb,
		},
	};
</script>
