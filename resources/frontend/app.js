require("./bootstrap");

import "./assets/scss/app.scss";
import "./assets/js/script.js";
import router from "./router/router";
import { createHead } from "@vueuse/head";
// import { createMetaManager } from 'vue-meta'

const head = createHead();

import { createApp } from "vue";
import VueTidio from "vue-tidio";

import FrontEnd from "./App.vue";

createApp(FrontEnd)
	.use(router)
	.use(head)
	.use(VueTidio, { appKey: "1yoerye8srqedbbeqdfekccvmrn30ff6" })
	.mount("#app");
