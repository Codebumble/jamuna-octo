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
				<div class="items w-full mx-auto">
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
				<div class="image">
					<img
						src="/frontend/images/contents/earth2.png"
						alt="earth" />
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
.detail {
	position: relative;
	.items {
		height: 200px;
		position: absolute;
		z-index: 2;
		overflow: hidden;
		margin: 0 auto;
		// left: 117px;
		#splide03-list li:nth-child(odd):not(.is-active) {
			height: 160px;
			transform: translate(10px, 56px);
			display: flex;
			flex-direction: column-reverse;
			justify-content: flex-end;
		}
		#splide03-list li.is-active {
			transform: translate(10px, -55px);
		}
		li:nth-child(1) {
			color: red;
		}
		li:nth-child(2) {
			color: green;
		}
		li:nth-child(3) {
			color: blue;
		}
		li:nth-child(4) {
			color: orange;
		}
		li:nth-child(5) {
			color: orchid;
		}
		.item {
			overflow: hidden;
			padding-top: 50px;
			padding-left: 8px;
			padding-right: 8px;
			padding-top: 20px;
			h3 {
				@apply font-bold text-center uppercase;
			}
		}
	}
	.columns {
		display: flex;
		justify-content: center;
		position: relative;
		height: 200px;
		.column {
			background: #e3e5e5;
			width: 5px;
			height: 200px;
			margin: 0 5px;
			position: absolute;
			z-index: 2;
		}
		.column:nth-child(1) {
			left: 18.1%;
			height: 210px;
			bottom: -147px;
		}
		.column:nth-child(2) {
			left: 33.2%;
			height: 120px;
			bottom: -48px;
		}
		.column:nth-child(3) {
			height: 160px;
			bottom: -20px;
			left: 50%;
		}
		.column:nth-child(4) {
			right: 33.6%;
			height: 120px;
			bottom: -45px;
		}
		.column:nth-child(5) {
			right: 17.2%;
			height: 215px;
			bottom: -148px;
		}
	}
	.image {
		width: 100%;
		position: relative;
		height: 320px;
		img {
			width: 100%;
			object-fit: cover;
			position: absolute;
		}
	}
}
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
