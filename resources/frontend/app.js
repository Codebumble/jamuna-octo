require("./bootstrap");

import "./assets/scss/app.scss";
import "./assets/js/script.js";
import router from "./router/router";

import { createMetaManager, plugin as vueMetaPlugin } from "vue-meta";

const metaManager = createMetaManager();


import { createApp } from "vue";

import FrontEnd from "./App.vue";

createApp(FrontEnd)
	.use(router)
	.use(metaManager)
	.use(vueMetaPlugin)
	.mount("#app");
