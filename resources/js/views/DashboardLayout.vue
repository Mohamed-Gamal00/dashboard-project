<template>
    <!-- /Loader -->
    <div class="page">
        <!-- Sidebar -->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar sidebar-scroll">
            <!-- Include sidebar content here -->
            <Sidebar />
        </aside>

        <!-- Main Content -->
        <div class="main-content app-content">
            <!-- Header -->
            <div class="main-header sticky side-header nav nav-item">
                <Header />
            </div>

            <!-- Page Content -->
            <div class="container-fluid mt-5">
                <router-view />
            </div>
        </div>

        <!-- Footer -->
        <div class="main-footer ht-40">
            <div class="container-fluid pd-t-0-f ht-100p">
                <span>
                    Copyright © 2020
                    <a href="#">Valex</a>. Designed by
                    <a href="https://www.spruko.com/">Spruko</a>. All rights
                    reserved.
                </span>
            </div>
        </div>
    </div>
</template>

<script>
import Sidebar from "../layouts/Sidebar.vue";
import Header from "../layouts/Header.vue";

export default {
    name: "DashboardLayout",
    components: {
        Sidebar,
        Header,
    },

    mounted() {
        this.initializeScripts();
    },
    methods: {
        initializeScripts() {
            this.$nextTick(() => {
                console.log("Initializing side menu after DOM update");
                if (typeof window.initializeSideMenu === "function") {
                    window.initializeSideMenu();
                }
            });
        },
    },
};
</script>

<style>
/* Include styles specific to this component here if needed */
</style>
