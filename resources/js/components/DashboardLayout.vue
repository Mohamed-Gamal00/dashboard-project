<template>
    <div class="">
        <!-- Sidebar -->
        <aside class="app-sidebar sidebar-scroll">
            <!-- Include sidebar content here -->
        </aside>

        <!-- Main Content -->
        <div class="main-content app-content">
            <!-- Header -->
            <div class="main-header sticky side-header nav nav-item">
                <!-- Include header content here -->
            </div>

            <!-- Page Content -->
            <div class="container-fluid">
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
export default {
    name: "DashboardLayout",
};
</script>

<style>
/* Include styles specific to this component here if needed */
</style>
