<template>
    <div>
        <h1>Company Page</h1>
        <div v-if="loading">Loading...</div>
        <div v-else-if="error" class="error">{{ error }}</div>
        <ul v-else>
            <!-- Render company data dynamically -->
            <li v-for="(company, index) in companyData.data" :key="index">
                <!-- {{ company.name }} -->
                {{ company.name }}
            </li>
        </ul>
    </div>
</template>

<script>
import { mapState } from "vuex";

export default {
    name: "Companies",
    data() {
        return {
            loading: true, // Track loading state
            error: null, // Track error state
        };
    },
    computed: {
        // Map state data directly from Vuex
        ...mapState({
            companyData: (state) => state.CompanyModule.company,
        }),
    },
    async mounted() {
        try {
            // Dispatch action to fetch company data
            await this.$store.dispatch("geCompany");
            console.log(
                "Vuex State (Company Data):",
                this.$store.state.CompanyModule.company
            );
        } catch (err) {
            // Handle errors
            this.error = "Failed to load company data.";
            console.error(err);
        } finally {
            // Ensure loading is stopped
            this.loading = false;
        }
    },
};
</script>

<style>
.error {
    color: red;
}
</style>
