import { createRouter, createWebHistory } from "vue-router";
const routes = [
	{
		path: "/",
		name: "home",
		component: () => import("../views/home.vue"),
	},
	{
		path: "/founder",
		name: "founder",
		component: () => import("../views/founder.vue"),
		meta: {
			title: "Founder | Jamuna Group",
		},
	},
	{
		path: "/chairman",
		name: "chairman",
		component: () => import("../views/chairman.vue"),
		meta: {
			title: "Chairman | Jamuna Group",
		},
	},
	{
		path: "/board-of-directors",
		name: "board-of-directors",
		component: () => import("../views/bod.vue"),
		meta: {
			title: "Board Of Directors | Jamuna Group",
		},
	},
	{
		path: "/company-profile",
		name: "company-profile",
		component: () => import("../views/company-profile.vue"),
		meta: {
			title: "Company Profile | Jamuna Group",
		},
	},
	{
		path: "/news-center",
		name: "news-center",
		component: () => import("../views/news-center.vue"),
		meta: {
			title: "News Center | Jamuna Group",
		},
	},
	{
		path: "/media-center/:id/:name",
		name: "jamuna-tv",
		component: () => import("../views/jamuna.vue"),
	},
	{
		path: "/companies/:id/:name",
		name: "Company",
		component: () => import("../views/company-view.vue"),
	},
	{
		path: "/growth-story",
		name: "growth",
		component: () => import("../views/growth.vue"),
		meta: {
			title: "Growth Stroy | Jamuna Group",
		},
	},
	{
		path: "/quality-process",
		name: "quality-process",
		component: () => import("../views/quality-process.vue"),
		meta: {
			title: "Quality Process | Jamuna Group",
		},
	},
	{
		path: "/contact",
		name: "contact",
		component: () => import("../views/contact.vue"),
		meta: {
			title: "Contact | Jamuna Group",
		},
	},
	{
		path: "/photo-gallery",
		name: "photo-gallery",
		component: () => import("../views/photo-gallery.vue"),
		meta: {
			title: "Photo Gallery | Jamuna Group",
		},
	},
	{
		path: "/career",
		name: "career",
		component: () => import("../views/career.vue"),
		meta: {
			title: "Career | Jamuna Group",
		},
	},
	{
		path: "/career-details/:id",
		name: "career-detail",
		component: () => import("../views/career-detail.vue"),
	},
	{
		path: "/event-details/:id",
		name: "event-detail",
		component: () => import("../views/event-details.vue"),
	},
	{
		path: "/nurul-islam-foundation",
		name: "n foundation",
		component: () => import("../views/nfoundation.vue"),
		beforeEnter: (to, from, next) => {
			window.location.href = "https://nurulislamfoundation.org/";
		},
	},
	{
		path: "/faq",
		name: "faq",
		component: () => import("../views/faq.vue"),
		meta: {
			title: "Frequently Asked Question | Jamuna Group",
		},
	},
	{
		path: "/tou",
		name: "terms-n-condition",
		component: () => import("../views/terms-condition.vue"),
		meta: {
			title: "Terms & Conditions | Jamuna Group",
		},
	},
	{
		path: "/privacy-policy",
		name: "privacy-policy",
		component: () => import("../views/privacy-policy.vue"),
		meta: {
			title: "Privacy Policy | Jamuna Group",
		},
	},
	{
		path: "/about",
		name: "about",
		component: () => import("../views/about.vue"),
		meta: {
			title: "About | Jamuna Group",
		},
	},
	{
		path: "/notfound",
		name: "not-found",
		component: () => import("../views/404.vue"),
		meta: {
			title: "404 Not Found | Jamuna Group",
		},
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

router.beforeEach((to, from, next) => {
	window.scrollTo(0, 0);
	const nearestWithTitle = to.matched
		.slice()
		.reverse()
		.find((r) => r.meta && r.meta.title);
	const nearestWithMeta = to.matched
		.slice()
		.reverse()
		.find((r) => r.meta && r.meta.metaTags);

	const previousNearestWithMeta = from.matched
		.slice()
		.reverse()
		.find((r) => r.meta && r.meta.metaTags);

	if (nearestWithTitle) {
		document.title = nearestWithTitle.meta.title;
	} else if (previousNearestWithMeta) {
		document.title = previousNearestWithMeta.meta.title;
	}

	Array.from(document.querySelectorAll("[data-vue-router-controlled]")).map(
		(el) => el.parentNode.removeChild(el)
	);


	nearestWithMeta.meta.metaTags
		.map((tagDef) => {
			const tag = document.createElement("meta");

			Object.keys(tagDef).forEach((key) => {
				tag.setAttribute(key, tagDef[key]);
			});

			tag.setAttribute("data-vue-router-controlled", "");

			return tag;
		})

		.forEach((tag) => document.head.appendChild(tag));
	document.querySelector("nav").classList.remove("active");
	document.querySelector("button.hamburger").classList.remove("is-active");
	document.body.style.overflowY = "scroll";
	if (!nearestWithMeta) return next();
});

export default router;
