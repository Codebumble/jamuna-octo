<template>
	<section class="growthHistory pb-16">
		<div class="container">
			Quality Process
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/quality-process';
</style>

<script>
		export default {
			data() {
				return {
					growthHistory: []
				}
			},
			components: {},
			mounted() {
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
					for (let i = 0; i < items.length; i++) {
						if (elementInViewport(items[i])) {
							items[i].classList.add('active');
						}
					}
				}

				// listen for events
				window.addEventListener('load', viewport);
				window.addEventListener('resize', viewport);
				window.addEventListener('scroll', viewport);
			},
		};
</script>
