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
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;
