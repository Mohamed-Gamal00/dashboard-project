import { createRouter, createWebHistory } from "vue-router";

// Import your components
import Home from "./views/Home.vue";
import About from "./views/About.vue";
import ExampleComponent from "./views/ExampleComponent.vue";
import DashboardLayout from "./components/DashboardLayout.vue";
import DashboardHome from "./views/DashboardHome.vue";

const routes = [
    {
        path: "/",
        component: DashboardLayout,
        children: [
            {
                path: "",
                name: "DashboardHome",
                component: DashboardHome, // A child component for the dashboard's main content
            },
            {
                path: "/home",
                name: "Home",
                component: Home,
            },
            {
                path: "/about",
                name: "About",
                component: About,
            },
        ],
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
