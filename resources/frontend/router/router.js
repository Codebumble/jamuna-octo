import { createRouter, createWebHistory } from "vue-router";
const routes = [
    {
        path: "/",
        name: "home",
        component: () => import("../views/home.vue"),

    },
    {
        path: "/about",
        name: "about",
        component: () => import("../views/about.vue"),
        force: true
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router