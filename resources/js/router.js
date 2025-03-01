import { createRouter, createWebHistory } from "vue-router";

// Import your components
import Home from "./views/home/Home.vue";
import Error404 from "./views/Error404.vue";
import DashboardLayout from "./views/DashboardLayout.vue";
import DashboardHome from "./views/home/DashboardHome.vue";
import Login from "./views/auth/Login.vue";
import Company from "./views/companies/Company.vue";
import CreateCompany from "./views/companies/CreateCompany.vue";
import EditCompany from "./views/companies/EditCompany.vue";

const routes = [
    {
        path: "/",
        component: DashboardLayout,
        children: [
            { path: "", name: "DashboardHome", component: DashboardHome },
            { path: "/home", name: "Home", component: Home, meta: { requiresAuth: true } },
            { path: "/companies", name: "companies.index", component: Company, meta: { requiresAuth: true } },
            { path: "/companies/create", name: "companies.create", component: CreateCompany, meta: { requiresAuth: true } },
            { path: "/companies/:id/edit", name: "companies.edit", component: EditCompany, meta: { requiresAuth: true } },
        ],
    },

    { path: "/login", name: "login", component: Login },

    { path: "/:pathMatch(.*)*", component: Error404 },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

// Global route guard to check authentication
router.beforeEach((to, from, next) => {
    const isAuthenticated = localStorage.getItem("auth_token"); // Check if user is authenticated (example: JWT token in localStorage)
    if (to.name === "login" && isAuthenticated) {
        // Redirect authenticated user trying to access login page
        next({ name: "Home" });
    } else if (to.meta.requiresAuth && !isAuthenticated) {
        // Redirect unauthenticated user trying to access protected routes
        next({ name: "login" });
    } else {
        // Continue navigation
        next();
    }
});

export default router;
