<template>
    <div>
        <Breadcrumb
            :breadcrumbs="[
                { label: 'الرئيسية', route: '/' },
                { label: 'الشركات', route: '' }, // No route for the last item
            ]"
            :is_AddButton_exist="true"
            addButtonRoute="companies.create"
        />
        <div v-if="loading">Loading...</div>
        <div v-else-if="error" class="error">{{ error }}</div>

        <div v-else class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <p class="tx-12 tx-gray-500 mb-2">
                            Example of Valex Striped Rows..
                            <a href="">Learn more</a>
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mg-b-0 text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Controle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(company, index) in companyData" :key="index">
                                        <th scope="row">{{ index }}</th>
                                        <td class="align-middle">
                                            <img height="40" :src="company.image" :alt="company.name" />
                                        </td>
                                        <td class="align-middle">
                                            {{ company.name }}
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex my-xl-auto right-content">
                                                <div class="pr-1 mb-3 mb-xl-0">
                                                    <router-link :to="{ name: 'companies.edit', params: { id: company.id } }" class="content-title mb-0 my-auto text-primary">
                                                        <button type="button" class="btn btn-primary btn-icon ml-2">
                                                            <i class="mdi mdi-pen"></i>
                                                        </button>
                                                    </router-link>
                                                </div>
                                                <div class="pr-1 mb-3 mb-xl-0">
                                                    <button type="submit" @click="deleteCompany(company.id)" class="btn btn-danger btn-icon ml-2" :disabled="isDelete[company.id]">
                                                        <span v-if="isDelete[company.id]"> <i class="mdi mdi-loading mdi-spin"></i></span>
                                                        <span v-else><i class="mdi mdi-delete"></i></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Breadcrumb from "../../components/Breadcrumb.vue";
import { mapState } from "vuex";

export default {
    name: "Companies",
    components: {
        Breadcrumb,
    },
    data() {
        return {
            loading: true, // Track loading state
            error: null, // Track error state
            isDelete: {},
        };
    },
    computed: {
        // Map state data directly from Vuex
        ...mapState({
            companyData: (state) => state.CompanyModule.company.records,
        }),
    },
    async mounted() {
        try {
            // Dispatch action to fetch company data
            await this.$store.dispatch("geCompany");
            // console.log(
            //     "Vuex State (Company Data):",
            //     this.$store.state.CompanyModule.company.records
            // );
        } catch (err) {
            // Handle errors
            this.error = "Failed to load company data.";
            console.error(err);
        } finally {
            // Ensure loading is stopped
            this.loading = false;
        }
    },

    methods: {

        async deleteCompany(companyId) {
            // ✅ Set loading state for the specific company
            this.isDelete = { ...this.isDelete, [companyId]: true };

            try {
                await axios.post(`/api/v1/companies/delete/${companyId}`);
                alert("تم الحذف بنجاح!");
                this.$store.dispatch("geCompany"); // Refresh the list after deletion
            } catch (error) {
                console.error(error);
            } finally {
                // ✅ Remove loading state for the specific company
                const { [companyId]: _, ...newState } = this.isDelete;
                this.isDelete = newState;
            }
        },
    },
};
</script>

<style>
.error {
    color: red;
}
</style>
