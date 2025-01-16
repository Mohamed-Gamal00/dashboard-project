<template>
    <div>
        <!-- <Breadcrumb
            :title="'Hi, welcome back!'"
            :subtitle="'Sales monitoring dashboard template.'"

        /> -->
        <h1>Welcome to the Dashboard</h1>
        <p>This is the main dashboard page.</p>
    </div>
</template>

<script>
import Breadcrumb from "../../components/Breadcrumb.vue";
export default {
    components: {
        Breadcrumb,
    },
    name: "DashboardHome",
};
</script>
