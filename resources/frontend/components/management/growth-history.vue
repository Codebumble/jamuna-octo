<template>
	<section class="growthHistory pb-16">
		<div class="container relative">
			<div class="timeline">
				<ul>
					<li
						class="item"
						v-for="timeline in growthHistory">
						<div class="content">
							<div class="heading">
								<h4 class="step">{{ timeline.year }}</h4>
							</div>
							<div class="main-content">
								<p>
									{{ timeline.description }}
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
					growthHistory: [
						{
							year: '1974',
							description: `The Group came into being.

	Mr.M.Nurul Islam, the architect of the Group, took up the challenge of bringing necessary technologies to Bangladeshi companies aiming to offset the bulk of foreign imports. His bold entrepreneurial spirit, progressive ideas and untiring efforts along with the devoted services of his colleagues, laid the strong foundation for success and future developments.`,
						},
						{
							year: '1975',
							description: `The first flagship enterprise of the Group, Jamuna Electric Manufacturing Co. Ltd. started operation. It pioneered the manufacturing of electrical accessories and fittings in Bangladesh. It is also producing PVC-compound and pipes.`,
						},
						{
							year: '1978',
							description: `Jamuna Electric & Engineering Industries Ltd. was established to produce ceiling fans, exhaust fans and ballasts.

	`,
						},
						{
							year: '1980',
							description: `Jamuna stepped into domestic production of high and low voltage cabbies and conductors though the inception of Jamuna Cables & rubber Industries.

	`,
						},
						{
							year: '1982',
							description: `Jamuna Wires was established to produce super enameled copper wires.

	`,
						},
						{
							year: '1988',
							description: `Jamuna Distillery Ltd. was launched for preparation of industrial and pharma alcohol, thereby making the Group�s entry into the chemical sector of the country. Presently, Jamuna Distillery Ltd. claims wide expertise in the chemical sector.`,
						},
					],
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
