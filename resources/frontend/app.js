require("./bootstrap");

import "./assets/scss/app.scss";
import "animate.css";
import "./assets/js/script.js";
import router from "./router/router";
import VueSocialSharing from "vue-social-sharing";

import { createMetaManager, plugin as vueMetaPlugin } from "vue-meta";
import VueAwesomePaginate from "vue-awesome-paginate";

// Splide Js
import VueSplide from '@splidejs/vue-splide';
import '@splidejs/vue-splide/css';

const metaManager = createMetaManager();

import { createApp } from "vue";

import FrontEnd from "./App.vue";

createApp(FrontEnd)
	.use(router)
	.use(VueSplide)
	.use(metaManager)
	.use(vueMetaPlugin)
	.use(VueSocialSharing)
	.use(VueAwesomePaginate)
	.mount("#app");
