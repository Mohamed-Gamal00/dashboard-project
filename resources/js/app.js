import "./bootstrap";
import { createApp } from "vue";
import router from "./router";
import App from "./App.vue";
import store from "./store"; // Import the Vuex store
import Alert from "./components/Alert.vue"; // Import your Alert component
createApp(App).use(router).component("Alert", Alert).use(store).mount("#app");
