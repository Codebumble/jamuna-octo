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
		path: "/news-center",
		name: "news-center",
		component: () => import("../views/news-center.vue"),
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
		path: "/growth-history",
		name: "growth",
		component: () => import("../views/growth.vue"),
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

router.beforeEach((to, from, next) => {
	document.querySelector("nav").classList.remove("active");
	document.querySelector("button.hamburger").classList.remove("is-active");
	next();
});

export default router;
