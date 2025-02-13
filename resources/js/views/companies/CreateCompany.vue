<template>
    <div>
        <Breadcrumb
            :breadcrumbs="[
                { label: 'الرئيسية', route: '/' },
                { label: 'الشركات', route: '/companies' }, // No route for the last item
                { label: 'إضافة شركة', route: '' },
            ]"
            :is_AddButton_exist="false"
            addButtonRoute="companies.create"
        />
        <div v-if="loading">Loading...</div>
        <div v-else-if="error" class="error">{{ error }}</div>

        <div v-else class="row row-sm">
            <div class="container">
                <form @submit.prevent="createCompany">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div v-if="message">
                                    <Alert :type="type" :message="message" :timeout="2000" />
                                </div>
                                <div class="pd-30 pd-sm-40 bg-gray-200">
                                    <InputComponent label="اسم الشركة" name="name" v-model="form.name" type="text" :error-message="errors.name ? errors.name[0] : ''" />

                                    <InputComponent label="اسم الشركة لغة انجليزية" name="name_en" v-model="form.name_en" type="text" :error-message="errors.name_en ? errors.name_en[0] : ''" />

                                    <InputComponent label="الصورة" name="image" type="file" @change="handleFileUpload" :error-message="errors.image ? errors.image[0] : ''" />

                                    <button type="submit" class="btn btn-main-primary pd-x-30 mg-t-5" :disabled="isCreate">
                                        <span v-if="isCreate"> <i class="mdi mdi-loading mdi-spin"></i> جاري الحفظ... </span>
                                        <span v-else>حفظ</span>
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
import Breadcrumb from "../../components/Breadcrumb.vue";
import InputComponent from "../../components/InputComponent.vue";

export default {
    name: "creatCompany",
    components: {
        Breadcrumb,
        InputComponent,
    },
    data() {
        return {
            loading: false,
            error: null,
            isCreate: false,
            message: "",
            type: "",
            form: {
                name: "",
                name_en: "",
                image: null,
            },
            errors: {},
        };
    },

    methods: {
        handleFileUpload(event) {
            this.form.image = event.target.files[0]; // Store the selected file
        },

        async createCompany() {
            this.isCreate = true;
            try {
                let formData = new FormData();
                formData.append("name", this.form.name || ""); // Ensure value is passed
                formData.append("name_en", this.form.name_en || ""); // Ensure value is passed
                if (this.form.image) {
                    formData.append("image", this.form.image);
                }

                let response = await axios.post(`/api/v1/companies/add`, formData, {
                    headers: { "Content-Type": "multipart/form-data" },
                });

                this.message = response.data.message;
                this.type = "info";

                setTimeout(() => {
                    this.message = "";
                    this.type = "";
                    this.$router.push({ name: "companies.index" });
                }, 2000);
            } catch (error) {
                console.log(error)
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
                this.isCreate = false;
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
