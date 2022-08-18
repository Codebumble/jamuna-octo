<template>
	<section class="growthHistory pb-16 angled upper-end">
		<div class="container relative">
			<div class="timeline">
				<ul>
					<li
						class="item"
						v-for="(timeline, key) in growthHistory"
						:key="key">
						<div class="content">
							<div class="heading">
								<h4 class="step">{{ timeline.year }}</h4>
							</div>
							<div class="main-content">
								<p v-if="isDesktop">
									{{timeline.description}}
								</p>
								<p v-else>
									<p v-if="timeline.description.length > 250">
									<p v-if="!timeline.readMore">{{ timeline.description.slice(0, 250) }} <span @click="timeline.readMore = !timeline.readMore" class="font-bold cursor-pointer">...read more</span></p>
									<p v-else>{{timeline.description}}</p>
								</p>
								<p v-else>{{ timeline.description }}</p>
								</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_growth';
</style>

<script>
	export default {
		data() {
			return {
				growthHistory: [],
				isDesktop: true,
				x: window.matchMedia('(max-width: 1023px)')
			};
		},
		components: {},
		methods: {
			detectScreen(x) {
				return x.matches ? this.isDesktop = false : this.isDesktop =true;
			}
		},created(){
			axios
				.get(window.location.origin + '/frontpage-api/growth-history')
				.then((response) => {
					this.growthHistory = response.data;
				});
		},
		mounted() {



			this.detectScreen(this.x);
			this.x.addListener(this.detectScreen);

			let items = document.querySelectorAll('.timeline li');

			function elementInViewport(el) {
				let rect = el.getBoundingClientRect();
				return (
					rect.top >= 0 &&
					rect.left >= 0 &&
					rect.bottom <=
						(window.innerHeight ||
							document.documentElement.clientHeight) &&
					rect.right <=
						(window.innerWidth ||
							document.documentElement.clientWidth)
				);
			}

			function viewport() {
				items.forEach((item) => {
					if (elementInViewport(item)) {
						item.classList.add('active');
					}
				});
			}


			// listen for events
			window.addEventListener('load', viewport);
			window.addEventListener('resize', viewport);
			window.addEventListener('scroll', viewport);
		},
	};
</script>
