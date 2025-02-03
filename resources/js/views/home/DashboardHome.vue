<template>
    <div>
        <Breadcrumb
            :title="'Hi, welcome back!'"
            :subtitle="'Sales monitoring dashboard template.'"

        />
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
    data() {
        return {
            dashboardData: null,
            loading: false,
            error: null,
        };
    },
    methods: {
        async fetchDashboardData() {
            this.loading = true;
            this.error = null;
            try {
                const response = await axios.get("http://127.0.0.1:8000/api/v1/dashboard");
                this.dashboardData = response.data.data; // Assuming the data is under `data`
            } catch (err) {
                this.error =
                    err.response?.data?.message ||
                    "An error occurred while fetching data.";
            } finally {
                this.loading = false;
            }
        },
    },
    created() {
        this.fetchDashboardData();
    },
};
</script>

<style scoped>
.error {
    color: red;
}
</style>
