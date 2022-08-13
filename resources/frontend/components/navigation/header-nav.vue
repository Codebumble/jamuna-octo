<template>
	<header class="py-4 fixed text-white w-full z-10 transparent-shadow">
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
					class="cb-nav max-h-144 overflow-scroll lg:overflow-visible"
					id="vl-nav">
					<ul
						class="block lg:flex"
						id="menu">
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
								<li class="mega-items hover:bg-indigo-50">
									<router-link
										to="/founder"
										class="mega-link">
										<div class="flex items-center">
											<div>
												<h1
													class="text-base text-gray-800">
													Founder
												</h1>
											</div>
										</div>
									</router-link>
								</li>

								<li class="mega-items hover:bg-green-50">
									<router-link
										to="/board-of-directors"
										class="mega-link">
										<div class="flex items-center">
											<div>
												<h1
													class="text-base text-gray-800">
													Board Of Director
												</h1>
											</div>
										</div>
									</router-link>
								</li>
							</ul>
						</li>
						<li class="cb-nav-item has-child">
							<a class="cb-nav-link">Jamuna Sector</a>
							<ul class="cb-mega">
								<li class="mega-items hover:bg-indigo-50">
									<router-link
										to="/hoorain-htf"
										class="mega-link">
										<div class="flex items-center">
											<div>
												<h1
													class="text-base text-gray-800">
													Hoorain HTF
												</h1>
											</div>
										</div>
									</router-link>
								</li>

								<li class="mega-items hover:bg-green-50">
									<router-link
										to=""
										class="mega-link">
										<div class="flex items-center">
											<div>
												<h1
													class="text-base text-gray-800">
													JAMUNA DENIMS LTD (GARMENTS
													UNIT)
												</h1>
											</div>
										</div>
									</router-link>
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
			// Mobile Menu
			function $(selector) {
				return document.querySelector(selector);
			}
			//  Elements
			var getIcon = $('#menu-icon');
			var getCbNav = $('#vl-nav');

			getIcon.addEventListener('click', () => {
				getIcon.classList.toggle('is-active');
				getCbNav.classList.toggle('active');
			});

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
					const a = e.currentTarget;
					if (currentMenuItem && a !== currentMenuItem) {
						toggleSubmenu(currentMenuItem);
					}

					toggleSubmenu(a);
				}

				function toggleSubmenu(a) {
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
							toggleSubmenu(currentMenuItem);
						} else if (
							'true' === e.target.getAttribute('aria-expanded')
						) {
							toggleSubmenu(currentMenuItem);
						}
					}
				}

				function closeOpenMenu(e) {
					if (
						currentMenuItem &&
						!e.target.closest('#' + container.id)
					) {
						toggleSubmenu(currentMenuItem);
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

			let width = screen.width;

			if (width <= 1023) {
				document.addEventListener('DOMContentLoaded', function () {
					const menus = document.querySelectorAll('#menu');

					menus.forEach((menu) => {
						let clickyMenu = new Menus(menu);
						clickyMenu.init();
					});
				});
			}
		},
	};
</script>
