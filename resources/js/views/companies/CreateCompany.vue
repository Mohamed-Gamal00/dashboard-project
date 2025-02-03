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

        <div v-else class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pd-30 pd-sm-40 bg-gray-200">
                            <InputComponent label="اسم الشركة" name="product_name" v-model="form.product_name" type="text" :error-message="errors.product_name" />
                            <InputComponent label="الصورة" name="file" v-model="form.photo" type="file" />

                            <button class="btn btn-main-primary pd-x-30 mg-t-5">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Breadcrumb from "../../components/Breadcrumb.vue";
import InputComponent from "../../components/InputComponent.vue";

export default {
    name: "Companies",
    components: {
        Breadcrumb,
        InputComponent,
    },
    data() {
        return {
            loading: false,
            error: null,
            form: {
                product_name: "",
                price: "",
            },
            errors: {},
        };
    },
};
</script>

<style>
.error {
    color: red;
}
</style>
