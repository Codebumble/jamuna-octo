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
		path: "/hoorain-htf",
		name: "hoorain",
		component: () => import("../views/hoorain.vue"),
	},
	{
		path: "/hoor",
		name: "hoor",
		component: () => import("../views/hoor.vue"),
	},
	{
		path: "/hooram",
		name: "hooram",
		component: () => import("../views/hooram.vue"),
	},
	{
		path: "/jamuna-denims-garments-ltd",
		name: "jdgu",
		component: () => import("../views/jdgu.vue"),
	},
	{
		path: "/jeansco",
		name: "jeansco",
		component: () => import("../views/jeansco.vue"),
	},
	{
		path: "/growth-story",
		name: "growth",
		component: () => import("../views/growth.vue"),
	},
	{
		path: "/mission-vision",
		name: "mission",
		component: () => import("../views/mission.vue"),
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
		path: "/career-details",
		name: "career-detail",
		component: () => import("../views/career-detail.vue"),
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
});

export default router;
