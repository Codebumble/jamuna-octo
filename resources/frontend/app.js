require('./bootstrap');

import './scss/app.scss';
import './js/script.js';
import router from './router/router';
import { createHead } from "@vueuse/head"
// import { createMetaManager } from 'vue-meta'

const head = createHead()

import {
    createApp
} from "vue";

import FrontEnd from "./App.vue";

createApp(FrontEnd)
    .use(router)
    .use(head)
    .mount("#app");