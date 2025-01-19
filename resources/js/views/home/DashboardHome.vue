<template>
    <div>
        <!-- <Breadcrumb
            :title="'Hi, welcome back!'"
            :subtitle="'Sales monitoring dashboard template.'"

        /> -->
        <h1>Welcome to the Dashboard</h1>
        <p>This is the main dashboard page.</p>
        <div v-if="loading">Loading...</div>
        <div v-if="error" class="error">{{ error }}</div>
        <div v-if="dashboardData" class="row row-sm">
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div
                    class="card overflow-hidden sales-card bg-primary-gradient"
                >
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">ordersCount</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4
                                        class="tx-20 font-weight-bold mb-1 text-white"
                                    >
                                        {{ dashboardData.ordersCount || '0' }}
                                    </h4>
                                    <p class="mb-0 tx-12 text-white op-7">
                                        Compared to last week
                                    </p>
                                </div>
                                <span class="float-right my-auto mr-auto">
                                    <i
                                        class="fas fa-arrow-circle-up text-white"
                                    ></i>
                                    <span class="text-white op-7"> +427</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-danger-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">
                                productsCount
                            </h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4
                                        class="tx-20 font-weight-bold mb-1 text-white"
                                    >
                                        {{ dashboardData.productsCount || '0' }}
                                    </h4>
                                    <p class="mb-0 tx-12 text-white op-7">
                                        Compared to last week
                                    </p>
                                </div>
                                <span class="float-right my-auto mr-auto">
                                    <i
                                        class="fas fa-arrow-circle-down text-white"
                                    ></i>
                                    <span class="text-white op-7">
                                        -23.09%</span
                                    >
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div
                    class="card overflow-hidden sales-card bg-success-gradient"
                >
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">
                                usersCount
                            </h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4
                                        class="tx-20 font-weight-bold mb-1 text-white"
                                    >
                                        {{ dashboardData.usersCount || '0' }}
                                    </h4>
                                    <p class="mb-0 tx-12 text-white op-7">
                                        Compared to last week
                                    </p>
                                </div>
                                <span class="float-right my-auto mr-auto">
                                    <i
                                        class="fas fa-arrow-circle-up text-white"
                                    ></i>
                                    <span class="text-white op-7"> 52.09%</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div
                    class="card overflow-hidden sales-card bg-warning-gradient"
                >
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">messagesCount</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4
                                        class="tx-20 font-weight-bold mb-1 text-white"
                                    >
                                        {{ dashboardData.messagesCount || '0' }}
                                    </h4>
                                    <p class="mb-0 tx-12 text-white op-7">
                                        Compared to last week
                                    </p>
                                </div>
                                <span class="float-right my-auto mr-auto">
                                    <i
                                        class="fas fa-arrow-circle-down text-white"
                                    ></i>
                                    <span class="text-white op-7"> -152.3</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                const response = await axios.get(
                    "/api/v1/dashboard"
                );
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
    mounted() {
        this.fetchDashboardData();
    },
};
</script>

<style scoped>
.error {
    color: red;
}
</style>
