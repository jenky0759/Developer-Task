import './bootstrap';
import {createApp} from "vue";
import App from "./App.vue";
import router from "./router.js";
import {createVfm} from "vue-final-modal";
import 'vue-final-modal/style.css';


createApp(App)
    .use(router)
    .use(createVfm())
    .mount("#app");
