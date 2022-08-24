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
	},
	{
		path: "/chairman",
		name: "chairman",
		component: () => import("../views/chairman.vue"),
	},
	{
		path: "/board-of-directors",
		name: "board-of-directors",
		component: () => import("../views/bod.vue"),
	},
	{
		path: "/company-profile",
		name: "company-profile",
		component: () => import("../views/company-profile.vue"),
	},
	{
		path: "/news-center",
		name: "news-center",
		component: () => import("../views/news-center.vue"),
	},
	{
		path: "/jamuna-tv",
		name: "jamuna-tv",
		component: () => import("../views/jamuna.vue"),
	},
	{
		path: "/the-daily-jugantor",
		name: "jugantor",
		component: () => import("../views/jugantor.vue"),
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
	},
	{
		path: "/quality-process",
		name: "quality-process",
		component: () => import("../views/quality-process.vue"),
	},
	{
		path: "/future-expansion",
		name: "future-expansion",
		component: () => import("../views/future-expansion.vue"),
	},
	{
		path: "/contact",
		name: "contact",
		component: () => import("../views/contact.vue"),
	},
	{
		path: "/photo-gallery",
		name: "photo-gallery",
		component: () => import("../views/photo-gallery.vue"),
	},
	{
		path: "/career",
		name: "career",
		component: () => import("../views/career.vue"),
	},
	{
		path: "/career",
		name: "career",
		component: () => import("../views/career.vue"),
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
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

router.beforeEach((to, from, next) => {
	document.querySelector("nav").classList.remove("active");
	document.querySelector("button.hamburger").classList.remove("is-active");
	document.body.style.overflowY = "scroll";
	next();
	window.scrollTo(0, 0);
});

export default router;
