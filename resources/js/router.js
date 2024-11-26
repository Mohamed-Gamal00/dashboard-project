import { createRouter, createWebHistory } from "vue-router";

// Import your components
import Home from "./views/home/Home.vue";
import ExampleComponent from "./views/Error404.vue";
import DashboardLayout from "./views/DashboardLayout.vue";
import DashboardHome from "./views/home/DashboardHome.vue";
import Login from "./views/auth/Login.vue";

const routes = [
    {
        path: "/",
        component: DashboardLayout,
        children: [
            {
                path: "",
                name: "DashboardHome",
                component: DashboardHome, // A child component for the dashboard's main content
                meta: { requiresAuth: true },
            },
            {
                path: "/home",
                name: "Home",
                component: Home,
                meta: { requiresAuth: true },
            },
        ],
    },

    {
        path: "/login",
        name: "login",
        component: Login,
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

// Global route guard to check authentication
router.beforeEach((to, from, next) => {
  const isAuthenticated = localStorage.getItem('auth_token'); // Check if user is authenticated (example: JWT token in localStorage)
  if (to.meta.requiresAuth && !isAuthenticated) {
    next({ name: 'login' }); // Redirect to login if not authenticated
  } else {
    next(); // Continue navigation
  }
});

export default router;
