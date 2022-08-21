require("./bootstrap");

import "./assets/scss/app.scss";
import "./assets/js/script.js";
import router from "./router/router";
// import { createHead } from "@vueuse/head";

import { createMetaManager } from "vue-meta";

const metaManager = createMetaManager();

// const head = createHead();

import { createApp } from "vue";

import FrontEnd from "./App.vue";

createApp(FrontEnd).use(router).use(metaManager).mount("#app");
