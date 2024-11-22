import { createRouter, createWebHistory } from "vue-router";

// Import your components
import Home from "./components/Home.vue";
import About from "./components/About.vue";
import ExampleComponent from "./components/ExampleComponent.vue";

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/about",
        name: "About",
        component: About,
    },
    {
        path: "/:pathMatch(.*)*",
        component: ExampleComponent,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
