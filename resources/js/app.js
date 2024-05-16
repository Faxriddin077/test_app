import './bootstrap';

import {createApp} from "vue";

import App from '../js/components/App.vue'
import store from "./utils/store.js";

createApp(App)
    .use(store)
    .mount('#app');
