<template>
	<header class="py-4 fixed text-white w-full z-10 transition-all">
		<div class="container">
			<div class="block lg:flex items-center justify-between max-h-12">
				<div
					class="brand-wrap"
					v-for="item in brandWrap">
					<router-link to="/">
						<img
							:src="item.logoSrc"
							:alt="item.alt"
							class="w-36 lg:w-48" />
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
						id="menu" :class="$route.name == 'home' ? 'nav-home' : ''">
						<li class="cb-nav-item">
							<router-link
								to="/"
								class="cb-nav-link"
								>Home</router-link
							>
						</li>

						<li class="cb-nav-item has-child">
							<a class="cb-nav-link">About </a>
							<ul class="cb-mega">
								<li class="mega-items">
									<router-link to="/founder"
										>Founder</router-link
									>
								</li>
								<li class="mega-items">
									<router-link to="/board-of-directors"
										>Board Of Directors</router-link
									>
								</li>
							</ul>
						</li>

						<li class="cb-nav-item has-child">
							<router-link
								to="/#"
								class="cb-nav-link"
								>Jamuna Sector</router-link
							>
							<ul class="cb-mega">
								<li class="mega-items has-inner">
									Textile Division
									<ul class="items-inner">
										<li>
											<router-link to="/hoorain-htf"
												>Hoorain HTF</router-link
											>
										</li>
										<li>
											<router-link
												to="/jamuna-denims-garments-ltd"
												>Jamuna Denims Garments
												LTD</router-link
											>
										</li>
										<li>
											<router-link to="/hoor"
												>Hoor</router-link
											>
										</li>
										<li>
											<router-link to="/jeansco"
												>Jeans & Co.</router-link
											>
										</li>
										<li>
											<router-link to="/hooram"
												>Hooram</router-link
											>
										</li>
										<li>
											<router-link to="/"
												>Jamuna Denims Ltd
												(Weaving)</router-link
											>
										</li>
										<li>
											<router-link to="/"
												>Jamuna Denims Ltd (Open
												End)</router-link
											>
										</li>
										<li>
											<router-link to="/"
												>Jamuna Spinning Mills
												Ltd</router-link
											>
										</li>
										<li>
											<router-link to="/"
												>Shameem Spinning Mills
												Ltd</router-link
											>
										</li>
										<li>
											<router-link to="/"
												>Shameem Rotor Spinning Mills
												Ltd</router-link
											>
										</li>
										<li>
											<router-link to="/"
												>Shameem Composite Mills
												Ltd</router-link
											>
										</li>
									</ul>
								</li>
								<li class="mega-items has-inner">
									Media & Advertisement
									<ul class="items-inner">
										<li>
											<router-link to="/"
												>The Daily Jugantor</router-link
											>
										</li>
										<li>
											<router-link to=""
												>Jamuna Television</router-link
											>
										</li>
									</ul>
								</li>
								<li class="mega-items has-inner">
									Jamuna Builders Ltd
									<ul class="items-inner">
										<li>
											<router-link to="/"
												>JW Marriot</router-link
											>
										</li>
										<li>
											<router-link to="/"
												>Jamuna Residence</router-link
											>
										</li>
										<li>
											<router-link to="/"
												>Jamuna Future Park</router-link
											>
										</li>
										<li>
											<router-link to="/"
												>Jamuna City</router-link
											>
										</li>
										<li>
											<router-link to="/"
												>New Ultra Model
												Town</router-link
											>
										</li>
									</ul>
								</li>
								<li class="mega-items has-inner">
									Marketplace
									<ul class="items-inner">
										<li>
											<router-link to=""
												>Wholesale Club Ltd</router-link
											>
										</li>
									</ul>
								</li>
								<li class="mega-items has-inner">
									Leathers
									<ul class="items-inner">
										<li>
											<router-link to="/"
												>Pegasus Leathers
												Ltd</router-link
											>
										</li>
										<li>
											<router-link to="/"
												>Pegasus Processing
												Unit</router-link
											>
										</li>
									</ul>
								</li>
								<li class="mega-items has-inner">
									Chemicals
									<ul class="items-inner">
										<li>
											<router-link to="/"
												>Jamuna Hand
												Sanitizer</router-link
											>
										</li>
										<li>
											<router-link to="/"
												>Jamuna Distilery
												Ltd</router-link
											>
										</li>
									</ul>
								</li>
								<li class="mega-items has-inner">
									Electronics
									<ul class="items-inner">
										<li>
											<router-link to="/"
												>Jamuna Electronics</router-link
											>
										</li>
									</ul>
								</li>
								<li class="mega-items has-inner">
									Engineering
									<ul class="items-inner">
										<li>
											<router-link to="/"
												>Jamuna Welding
												Electrode</router-link
											>
										</li>
									</ul>
								</li>
								<li class="mega-items has-inner">
									Beverage
									<ul class="items-inner">
										<li>
											<router-link to="/"
												>Crown Beverage</router-link
											>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="cb-nav-item has-child">
							<router-link
								class="cb-nav-link"
								to="#"
								>Management</router-link
							>
							<ul class="cb-mega">
								<li class="mega-items">
									<router-link to="/growth-history"
										>Growth Story</router-link
									>
								</li>
								<li class="mega-items">
									<router-link to="/mission-vision"
										>Mission & Vision</router-link
									>
								</li>
								<li class="mega-items">
									<router-link to="/quality-process"
										>Quality Process</router-link
									>
								</li>
								<li class="mega-items">
									<router-link to="/future-expansion"
										>Future Expansion</router-link
									>
								</li>
							</ul>
						</li>

						<li class="cb-nav-item">
							<router-link
								to="/news-center"
								class="cb-nav-link">
								News Center
							</router-link>
						</li>
						<li class="cb-nav-item">
							<router-link
								to="/career"
								class="cb-nav-link">
								Career
							</router-link>
						</li>

						<li class="cb-nav-item">
							<router-link
								to="/photo-gallery"
								class="cb-nav-link"
								>Photo Gallery</router-link
							>
						</li>

						<li class="cb-nav-item">
							<router-link
								to="/etender"
								class="cb-nav-link"
								>E-Tender</router-link
							>
						</li>
						<li class="cb-nav-item">
							<router-link
								to="/contact"
								class="cb-nav-link"
								>Contact</router-link
							>
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
							<span>&copy; 2022 Codebumble Inc</span>
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
						logoSrc: '/frontend/images/logo/code-white.svg',
						alt: 'logo',
					},
				],
			};
		},
		mounted() {
			const header = document.querySelector('header');
			const navLink = document.querySelector('#vl-nav > ul');

			window.onscroll = function () {
				// 'use strict';
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
					document.body.style.overflow = 'hidden';
				else document.body.style.overflow = 'scroll';
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
						.filter((_, index) => index % 2 !== 0)
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
				child.addEventListener('click', (e) => {
					if (!e.target.classList.contains('mega-items')) return;
					if (detectScreen(x) === 'desktop') return;

					child.classList.toggle('active');
				});
			});
		},
	};
</script>
