import { createRouter, createWebHistory } from "vue-router";

// Import your components
import Home from "./views/home/Home.vue";
import About from "./views/home/About.vue";
import ExampleComponent from "./views/Error404.vue";
import DashboardLayout from "./views/DashboardLayout.vue";
import DashboardHome from "./views/home/DashboardHome.vue";

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
