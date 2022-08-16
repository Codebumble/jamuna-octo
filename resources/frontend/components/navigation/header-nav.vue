<template>
	<header class="py-4 fixed text-white w-full z-10 transition-all">
		<div class="container">
			<div class="block lg:flex items-center justify-between max-h-12">
				<div
					class="brand-wrap"
					v-for="(item, key) in brandWrap"
					:key="key">
					<router-link to="/">
						<img
							:src="item.logoSrc"
							:alt="item.alt"
							class="w-60" />
					</router-link>
					<!-- logo -->
					<div class="lg:hidden">
						<!-- responsive book a call button -->
						<button
							class="hamburger hamburger--slider"
							type="button"
							id="menu-icon">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
						<!-- responsive  hamburger icon -->
					</div>
				</div>
				<!-- .brand-wrap -->
				<nav
					class="cb-nav overflow-scroll lg:overflow-visible h-screen lg:h-auto"
					id="vl-nav">
					<ul
						class="block lg:flex"
						id="menu"
						:class="$route.name == 'home' ? 'nav-home' : ''">
						<li
							class="cb-nav-item"
							:class="menu.parentSubmenu ? 'has-child' : ''"
							v-for="(menu, key) in navMenu"
							:key="key">
							<router-link
								:to="menu.route"
								class="cb-nav-link">
								{{ menu.label }}
							</router-link>

							<ul
								class="cb-mega"
								v-if="menu.parentSubmenu">
								<li
									class="mega-items"
									:class="psm.childSubmenu ? 'has-inner' : ''"
									v-for="(psm, key) in menu.parentSubmenu"
									:key="key">
									<router-link
										:to="psm.route"
										v-if="psm.route">
										{{ psm.label }}
									</router-link>
									<span v-else>{{ psm.label }}</span>

									<ul
										class="items-inner"
										v-if="psm.childSubmenu">
										<li
											v-for="(
												csm, key
											) in psm.childSubmenu"
											:key="key">
											<router-link :to="csm.route">
												{{ csm.label }}
											</router-link>
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
					<!-- navigation items -->
					<div class="nav-footer">
						<div class="social">
							<ul>
								<li>
									<a
										href="https://instagram.com"
										target="_blank"
										><i class="fab fa-instagram-square"></i
									></a>
								</li>
								<li>
									<a
										href="https://facebook.com"
										target="_blank"
										><i class="fab fa-facebook"></i
									></a>
								</li>
								<li>
									<a
										href="https://twitter.com"
										target="_blank"
										><i class="fab fa-twitter"></i
									></a>
								</li>
								<li>
									<a href=""><i class="fab fa-google"></i></a>
								</li>
								<li>
									<a href=""
										><i class="fab fa-google-play"></i
									></a>
								</li>
							</ul>
						</div>
						<div class="copyright-text">
							<span>&copy; 2022 Jamuna Group</span>
						</div>
					</div>
				</nav>
				<!-- .cb-nav closed -->
			</div>
		</div>
	</header>
	<!-- Header Closed -->
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_header-nav.scss';
	@import '../../assets/scss/variables/_hamburger.scss';
</style>

<script>
	export default {
		data() {
			return {
				brandWrap: [
					{
						logoSrc: process.env.APP_LOGO,
						alt: 'logo',
					},
				],
				navMenu: [
					{
						route: '/',
						label: 'Home',
					},
					{
						route: '',
						label: 'About',
						parentSubmenu: [
							{
								route: '/founder',
								label: 'Founder',
							},
							{
								route: '/board-of-directors',
								label: 'Board Of Directors',
							},
						],
					},
					{
						route: '',
						label: 'Jamuna Sector',
						parentSubmenu: [
							{
								route: '',
								label: 'Textile Division',
								childSubmenu: [
									{
										route: '/hoorain-htf',
										label: 'Hoorain HTF',
									},
									{
										route: '/jamuna-denims-garments-ltd',
										label: 'Jamuna Denims Garments LTD',
									},
									{
										route: '/hoor',
										label: 'Hoor',
									},
									{
										route: '/jeansco',
										label: 'Jeans & Co.',
									},
									{
										route: '/hooram',
										label: 'Hooram',
									},
									{
										route: '',
										label: 'Jamuna Denims Ltd (Weaving)',
									},
									{
										route: '',
										label: 'Jamuna Denims Ltd (Open End)',
									},
									{
										route: '',
										label: 'Jamuna Spinning Mills Ltd',
									},
									{
										route: '',
										label: 'Shameem Spinning Mills Ltd',
									},
									{
										route: '',
										label: 'Shameem Rotor Spinning Mills Ltd',
									},
									{
										route: '',
										label: 'Shameem Composite Mills Ltd',
									},
								],
							},
							{
								route: '',
								label: 'Media & Advertisement',
								childSubmenu: [
									{
										route: '/the-daily-jugantor',
										label: 'The Daily Jugantor',
									},
									{
										route: '/jamuna-television',
										label: 'Jamuna Television',
									},
								],
							},
							{
								route: '',
								label: 'Jamuna Builders Ltd',
								childSubmenu: [
									{
										route: '',
										label: 'JW Marriot',
									},
									{
										route: '',
										label: 'Jamuna Residence',
									},
									{
										route: '',
										label: 'Jamuna Future Park',
									},
									{
										route: '',
										label: 'Jamuna City',
									},
									{
										route: '',
										label: 'New Ultra Model Town',
									},
								],
							},
							{
								route: '',
								label: 'Marketplace',
								childSubmenu: [
									{
										route: '',
										label: 'Wholesale Club Ltd',
									},
								],
							},
							{
								route: '',
								label: 'Leathers',
								childSubmenu: [
									{
										route: '',
										label: 'Pegasus Leathers Ltd',
									},
									{
										route: '',
										label: 'Pegasus Leathers Ltd',
									},
								],
							},
							{
								route: '',
								label: 'Chemicals',
								childSubmenu: [
									{
										route: '/jamuna-hand-sanitizer',
										label: 'Jamuna Hand Sanitizer',
									},
									{
										route: '/jamuna-distilery-ltd',
										label: 'Jamuna Distilery Ltd',
									},
								],
							},
							{
								route: '',
								label: 'Electronics',
								childSubmenu: [
									{
										route: '/jamuna-electornics',
										label: 'Jamuna Electronics',
									},
								],
							},
							{
								route: '',
								label: 'Engineering',
								childSubmenu: [
									{
										route: '',
										label: 'Jamuna Welding Electrode',
									},
								],
							},
							{
								route: '',
								label: 'Beverage',
								childSubmenu: [
									{
										route: '/crown-beverage',
										label: 'Crown Beverage',
									},
								],
							},
						],
					},
					{
						route: '',
						label: 'Management',
						parentSubmenu: [
							{
								route: '/growth-story',
								label: 'Growth Story',
							},
							{
								route: '/mission-vision',
								label: 'Mission & Vision',
							},
							{
								route: '/quality-process',
								label: 'Quality Process',
							},
							{
								route: '/future-expansion',
								label: 'Future Expansion',
							},
						],
					},
					{
						route: '/news-center',
						label: 'News Center',
					},
					{
						route: '',
						label: 'Photo Gallery',
					},
					{
						route: '',
						label: 'Career',
					},
					{
						route: '',
						label: 'Contact',
					},
				],
			};
		},
		mounted() {
			const header = document.querySelector('header');
			const navLink = document.querySelector('#vl-nav > ul');

			window.onscroll = function () {
				if (
					document.body.scrollTop >= 100 ||
					document.documentElement.scrollTop >= 100
				) {
					header.classList.add('transparent-shadow');
					navLink.classList.add('scroll');
				} else {
					header.classList.remove('transparent-shadow');
					navLink.classList.remove('scroll');
				}
			};
			// Mobile Menu

			axios
				.get(window.location.origin + '/frontpage-api/header-data')
				.then((response) => {
					this.brandWrap[0].logoSrc = response.data.APP_LOGO;
				});
			function $(selector) {
				return document.querySelector(selector);
			}
			//  Elements
			const getIcon = $('#menu-icon');
			const getCbNav = $('#vl-nav');

			getIcon.addEventListener('click', () => {
				getIcon.classList.toggle('is-active');
				getCbNav.classList.toggle('active');
				if (getCbNav.classList.contains('active'))
					document.body.style.overflowY = 'hidden';
				else document.body.style.overflowY = 'scroll';
			});

			const x = window.matchMedia('(max-width: 1023px)');
			// Detect Screen
			function detectScreen(x) {
				return x.matches ? 'mobile' : 'desktop';
			}

			detectScreen(x); // Call listener function at run time
			x.addListener(detectScreen); // Attach listener function on state changes

			// Mega Menu
			const Menus = function (menu) {
				// DOM element(s)
				let container = menu.parentElement,
					currentMenuItem,
					i,
					len;

				this.init = function () {
					menuSetup();
					document.addEventListener('click', closeOpenMenu);
				};
				function toggleOnMenuClick(e) {
					let x = e.target.parentNode.childNodes[1].childNodes;
					Array.from(x)
						.filter((item) => item.firstChild !== null)
						.forEach((el) => {
							el.classList.remove('active');
						});
					const a = e.currentTarget;
					if (currentMenuItem && a !== currentMenuItem) {
						toggleSubmenu(currentMenuItem, detectScreen(x));
					}

					toggleSubmenu(a, detectScreen(x));
				}

				function toggleSubmenu(a) {
					if (detectScreen(x) === 'desktop') return;
					const submenu = document.getElementById(
						a.getAttribute('aria-controls')
					);

					if ('true' === a.getAttribute('aria-expanded')) {
						a.setAttribute('aria-expanded', false);
						submenu.setAttribute('aria-hidden', true);
						currentMenuItem = false;
					} else {
						a.setAttribute('aria-expanded', true);
						submenu.setAttribute('aria-hidden', false);
						preventOffScreenSubmenu(submenu);
						currentMenuItem = a;
					}
				}

				function preventOffScreenSubmenu(submenu) {
					const screenWidth =
							window.innerWidth ||
							document.documentElement.clientWidth ||
							document.body.clientWidth,
						parent = submenu.offsetParent,
						menuLeftEdge = parent.getBoundingClientRect().left,
						menuRightEdge = menuLeftEdge + submenu.offsetWidth;

					if (menuRightEdge + 32 > screenWidth) {
						submenu.classList.add('sub-menu--right');
					}
				}

				function closeOnEscKey(e) {
					if (27 === e.keyCode) {
						// we're in a submenu item
						if (
							null !== e.target.closest('ul[aria-hidden="false"]')
						) {
							currentMenuItem.focus();
							toggleSubmenu(currentMenuItem, detectScreen(x));
						} else if (
							'true' === e.target.getAttribute('aria-expanded')
						) {
							toggleSubmenu(currentMenuItem, detectScreen(x));
						}
					}
				}

				function closeOpenMenu(e) {
					if (
						currentMenuItem &&
						!e.target.closest('#' + container.id)
					) {
						toggleSubmenu(currentMenuItem, detectScreen(x));
					}
				}
				function menuSetup() {
					menu.classList.remove('no-js');

					menu.querySelectorAll('ul.cb-mega').forEach((submenu) => {
						const menuItem = submenu.parentElement;

						if ('undefined' !== typeof submenu) {
							let a = convertLinkToa(menuItem);

							setUpAria(submenu, a);

							// bind event listener to a
							a.addEventListener('click', toggleOnMenuClick);
							menu.addEventListener('keyup', closeOnEscKey);
						}
					});
				}
				function convertLinkToa(menuItem) {
					const link = menuItem.getElementsByTagName('a')[0],
						linkHTML = link.innerHTML,
						linkAtts = link.attributes,
						a = document.createElement('a');

					if (null !== link) {
						// copy a attributes and content from link
						a.innerHTML = linkHTML.trim();
						for (i = 0, len = linkAtts.length; i < len; i++) {
							let attr = linkAtts[i];
							if ('href' !== attr.name) {
								a.setAttribute(attr.name, attr.value);
							}
						}

						menuItem.replaceChild(a, link);
					}

					return a;
				}

				function setUpAria(submenu, a) {
					const submenuId = submenu.getAttribute('id');

					let id;
					if (null === submenuId) {
						id =
							a.textContent
								.trim()
								.replace(/\s+/g, '-')
								.toLowerCase() + '-submenu';
					} else {
						id = menuItemId + '-submenu';
					}
					a.setAttribute('aria-controls', id);
					a.setAttribute('aria-expanded', false);
					submenu.setAttribute('id', id);
					submenu.setAttribute('aria-hidden', true);
				}
			};

			document.addEventListener('DOMContentLoaded', function () {
				const menus = document.querySelectorAll('#menu');

				menus.forEach((menu) => {
					let clickyMenu = new Menus(menu);
					clickyMenu.init();
				});
			});

			document.querySelectorAll('.has-inner').forEach((child) => {
				child.childNodes[0].addEventListener('click', () => {
					child.classList.toggle('active');
				});
				child.addEventListener('click', (e) => {
					if (!e.target.classList.contains('mega-items')) return;
					if (detectScreen(x) === 'desktop') return;

					child.classList.toggle('active');
				});
			});
		},
	};
</script>
