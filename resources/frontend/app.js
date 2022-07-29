require('./bootstrap');

import './scss/app.scss';

import {
    createApp
} from "vue";

import FrontEnd from "./App.vue";

createApp(FrontEnd).mount("#app");