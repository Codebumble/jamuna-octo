<template>
	<section class="group-company bg-slate-50">
		<div class="container">
			<div class="title mb-8">
				<h2 class="text-2xl lg:text-4xl text-gray-800 font-bold">
					About Us
				</h2>
				<p>
					Lorem ipsum dolor sit amet consectetur adipisicing elit.
					Voluptate accusantium vero rerum, officia, consequuntur
					laudantium maiores nulla vitae eos animi cumque recusandae
					molestias provident autem repellat temporibus, magnam atque
					beatae!
				</p>
			</div>
			<div class="detail">
				<div class="items w-4/5 mx-auto">
					<Splide
						:options="options"
						aria-label="concerns logo slider">
						<SplideSlide
							v-for="(item, index) in items"
							:key="index"
							class="
								flex
								justify-around
								items-center
								transition-all
								overflow-hidden
								p-4
							">
							<div class="item">
								<h3>{{ item.text }}</h3>
								<h3>{{ item.number }}</h3>
							</div>
						</SplideSlide>
					</Splide>
				</div>
				<div class="columns">
					<div class="column"></div>
					<div class="column"></div>
					<div class="column"></div>
					<div class="column"></div>
					<div class="column"></div>
				</div>
				<div class="image"></div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
.detail {
	@apply relative;
	.items {
		@apply absolute h-[200px] z-[2] overflow-hidden mx-auto left-[117px];
		#splide04-list li:nth-child(odd):not(.is-active) {
			@apply h-[160px] flex flex-col-reverse justify-end;
			transform: translate(25px, 82px);
		}
		#splide04-list li:nth-child(even) {
			transform: translate(13px, -20px);
		}
		#splide04-list li.is-active {
			transform: translate(25px, -74px);
		}
		.item {
			@apply overflow-hidden pt-[20px];
			h3 {
				@apply font-bold text-center uppercase text-[13px];
			}
		}
	}
	.columns {
		@apply flex justify-center relative h-[200px];
		.column {
			@apply w-1 my-1 absolute z-0;
			background: #e3e5e5;
		}
		.column:nth-child(1) {
			@apply h-[180px] bottom-[-148px] left-[18.5%] 2xl:bottom-[-165px];
		}
		.column:nth-child(2) {
			@apply h-40 -bottom-[63px] left-[33.5%] 2xl:-bottom-[68px];
		}
		.column:nth-child(3) {
			@apply h-[180px] bottom-[-35px] left-[50.5%];
		}
		.column:nth-child(4) {
			@apply h-40 -bottom-[60px] right-[34.2%] 2xl:-bottom-[65px];
		}
		.column:nth-child(5) {
			@apply h-[180px] bottom-[-148px] right-[17.2%] 2xl:bottom-[-165px];
		}
	}
	.image {
		// @apply w-full relative -bottom-[31px] bg-cover bg-no-repeat h-80;
		background: url(/frontend/images/contents/earth.png);
		width: 100%;
		position: relative;
		height: 320px;
		background-repeat: no-repeat;
		background-size: cover;
		bottom: -31px;
	}
}

// @media only screen and (min-width: 1536px) {
// 	#splide04-list li:nth-child(odd):not(.is-active) {
// 		transform: translate(50px, 82px);
// 	}
// 	#splide04-list li:nth-child(even) {
// 		transform: translate(35px, -20px);
// 	}
// }
</style>

<script>
import { Splide, SplideSlide } from '@splidejs/vue-splide';
export default {
	data() {
		return {
			items: [
				{
					text: 'exporting countries',
					number: '32',
				},
				{
					text: 'landmark project',
					number: '35',
				},
				{
					text: 'established',
					number: '1974',
				},
				{
					text: 'industrial units',
					number: '42',
				},
				{
					text: 'employee strength',
					number: '45,000',
				},
			],
		};
	},
	components: {
		Splide,
		SplideSlide,
	},
	mounted() {},
	setup() {
		const options = {
			rewind: false,
			autoPlay: false,
			perPage: 5,
			perMove: 1,
			pagination: false,
			arrows: false,
			type: 'loop',
			focus: 'center',
			drag: false,
			breakpoints: {
				1024: {
					perPage: 2,
				},
				640: {
					perPage: 1,
				},
			},
		};

		return { options };
	},
};
</script>
