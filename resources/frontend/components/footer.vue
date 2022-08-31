<template>
	<footer class="footer py-[30px]">
		<div class="container">
			<div
				class="pb-8 px-8 xl:px-0 flex lg:flex-row flex-col justify-between items-center lg:border-b border-gray-300 pt-8 lg:pt-0">
				<div>
					<img
						:src="footerTop.logo"
						:alt="footerTop.alt"
						class="w-80 hidden lg:block" />
				</div>
				<div class="flex">
					<ul class="flex">
						<li class="mr-2 text-gray-600 hover:text-blue-600">
							<a
								:href="footerSocial.facebook"
								class="">
								<i class="fab fa-facebook text-3xl"></i>
							</a>
						</li>
						<li class="mx-2 text-gray-600 hover:text-red-600">
							<a :href="footerSocial.instagram">
								<i class="fab fa-instagram text-3xl"></i>
							</a>
						</li>
						<li class="mx-2 text-gray-600 hover:text-red-600">
							<a :href="footerSocial.youtube"
								><i class="fab fa-youtube text-3xl"></i
							></a>
						</li>
						<li class="ml-2 text-gray-600 hover:text-[#0077b5]">
							<a :href="footerSocial.linkedin">
								<i class="fab fa-linkedin text-3xl"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="flex flex-col lg:flex-row justify-between links">
				<div
					class="lg:oder-1 order-2 flex basis-8/12 flex-wrap text-sm">
					<ul class="basis-2/4 lg:basis-2/6">
						<li
							v-for="(link, key) in linksCol1"
							:key="key">
							<router-link :to="link.link">{{ link.linkText }}</router-link>
						</li>
					</ul>
					<ul class="flex flex-col basis-2/4 lg:basis-2/6">
						<li
							v-for="(link, key) in linksCol2"
							:key="key">
							<router-link :to="link.link">{{ link.linkText }}</router-link>
						</li>
					</ul>
					<ul class="flex flex-col basis-2/4 lg:basis-2/6">
						<li
							v-for="(link, key) in linksCol3"
							:key="key">
							<router-link :to="link.link">{{ link.linkText }}</router-link>
						</li>
					</ul>
				</div>
				<div
					class="lg:order-2 order-1 mb-3 text-center lg:text-left flex flex-col basis-4/12">
					<h2
						class="text-4xl font-bold text-red-600 leading-snug mb-2">
						{{ footerAbout.heading }}
					</h2>
					<p class="text-gray-400">
						{{ footerAbout.description }}
					</p>
				</div>
			</div>
			<div class="text-sm text-center lg:text-left">
				<p>
					&copy; 2022
					<router-link
						to="/"
						class="underline decoration-dotted decoration-gray-400">
						{{ footerAbout.heading }}
					</router-link>
					all right reserved.
				</p>
			</div>
		</div>
	</footer>
</template>

<style lang="scss">
	@import '../assets/scss/variables/_footer.scss';
</style>

<script>
	export default {
		data() {
			return {
				footerTop: {
					logo: '',
					alt: 'logo',
				},
				footerSocial: {},
				linksCol1: [
					{
						linkText: 'Compliance',
						link: '/compliance',
					},
					{
						linkText: 'FAQ',
						link: '/faq',
					},
				],
				linksCol2: [
					{
						linkText: 'News Center',
						link: '/news-center',
					},
					{
						linkText: 'Contact Us',
						link: '/contact',
					},
				],
				linksCol3: [
					{
						linkText: 'Terms of Use',
						link: '/tou',
					},
					{
						linkText: 'Privacy Policy',
						link: '/privacy-policy',
					},
					{
						linkText: '',
						link: '',
					},
				],
				footerAbout: {
					// heading: 'Jamuna Group',
					// description:
					// 	'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae id dolor voluptas obcaecati.',
				},
			};
		},
		mounted() {
			axios
				.get(window.location.origin + '/frontpage-api/footer-component')
				.then((response) => {
					this.footerSocial = response.data.social_media;
					this.footerAbout = response.data.footer_about;
					this.footerTop.logo = response.data.APP_LOGO;
				});
		},
	};
</script>
