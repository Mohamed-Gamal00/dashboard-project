<template>
    <div>
        <Breadcrumb
            :breadcrumbs="[
                { label: 'الرئيسية', route: '/' },
                { label: 'الشركات', route: '/companies' },
                { label: 'تعديل شركة', route: '' },
            ]"
            :is_AddButton_exist="false"
            addButtonRoute="companies.create"
        />
        <div v-if="loading">Loading...</div>
        <div v-else-if="error" class="error">{{ error }}</div>

        <div v-else class="row row-sm">
            <div class="container">
                <form @submit.prevent="updateCompany">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div v-if="message">
                                    <Alert :type="type" :message="message" :timeout="2000" />
                                </div>
                                <div class="pd-30 pd-sm-40 bg-gray-200">
                                    <InputComponent label="اسم الشركة" name="name" v-model="form.name" type="text" :error-message="errors.name ? errors.name[0] : ''" />
                                    <InputComponent label="اسم الشركة لغة انجليزية"   name="name_en" v-model="form.name_en" type="text" :error-message="errors.name_en ? errors.name_en[0] : ''" />

                                    <InputComponent label="الصورة" name="image" type="file" v-model="form.image_url" @change="handleFileUpload" />

                                    <button type="submit" class="btn btn-main-primary pd-x-30 mg-t-5" :disabled="isUpdating">
                                        <span v-if="isUpdating"> <i class="mdi mdi-loading mdi-spin"></i> جاري التحديث... </span>
                                        <span v-else>تحديث</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Breadcrumb from "../../components/Breadcrumb.vue";
import InputComponent from "../../components/InputComponent.vue";

export default {
    name: "EditCompany",
    components: {
        Breadcrumb,
        InputComponent,
    },
    data() {
        return {
            loading: true,
            error: null,
            isUpdating: false,
            message: "",
            type: "",
            form: {
                name: "",
                name_en: "",
                image: null,
                image_url: "",
            },
            errors: {},
            companyId: this.$route.params.id, // Get company ID from route
        };
    },

    mounted() {
        this.fetchCompany();
    },

    methods: {
        async fetchCompany() {
            try {
                const response = await axios.get(`/api/v1/companies/show/${this.companyId}`);
                this.form.name = response.data.data.name;
                this.form.name_en = response.data.data.name_en;
                this.form.image_url = response.data.data.image; // Assuming the API returns the image URL
                this.loading = false;
            } catch (err) {
                this.error = "Failed to load company details.";
                this.loading = false;
            }
        },

        handleFileUpload(event) {
            this.form.image = event.target.files[0]; // Store the selected file
        },

        async updateCompany() {
            this.isUpdating = true;
            try {
                let formData = new FormData();

                formData.append("name", this.form.name);
                formData.append("name_en", this.form.name_en);
                if (this.form.image) {
                    formData.append("image", this.form.image); // Add file only if selected
                }

                let response = await axios.post(`api/v1/companies/update/${this.companyId}`, formData, {
                    headers: { "Content-Type": "multipart/form-data" },
                });

                this.message = response.data.message;
                this.type = "info";

                setTimeout(() => {
                    this.message = "";
                    this.type = "";
                    this.$router.push({ name: "companies.index" });
                }, 2000);

                // Redirect after update
            } catch (error) {
                this.errors = error.response?.data?.errors || {};
                if (error.status == 422) {
                    this.message = "خطأ في التحقق من القيم";
                    this.type = "danger";
                    setTimeout(() => {
                        this.errors = "";
                        this.message = "";
                        this.type = "";
                    }, 3000);
                }
            } finally {
                this.isUpdating = false; // Stop loading after request completes
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
