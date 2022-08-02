require('./bootstrap');

import './scss/app.scss';
import './js/script.js';

import {
    createApp
} from "vue";

import FrontEnd from "./App.vue";

createApp(FrontEnd).mount("#app");