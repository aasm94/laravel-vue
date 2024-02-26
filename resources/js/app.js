import './bootstrap';
import { createApp } from "vue";
import registerForm from "./layouts/register.vue";
import loginForm from "./layouts/login.vue";
import vuetify from "./vuetify";

createApp(registerForm, loginForm).use(vuetify).mount("#app");
