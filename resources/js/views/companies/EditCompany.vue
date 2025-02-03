<template>
    <div>
        <Breadcrumb
            :breadcrumbs="[
                { label: 'الرئيسية', route: '/' },
                { label: 'الشركات', route: '/companies' }, // No route for the last item
                { label: 'تعديل شركة', route: '' },
            ]"
            :is_AddButton_exist="true"
            addButtonRoute="companies.create"
        />
        <div v-if="loading">Loading...</div>
        <div v-else-if="error" class="error">{{ error }}</div>

        <div v-else class="row row-sm">
            <h1>edit company</h1>
        </div>
    </div>
</template>

<script>
import Breadcrumb from "../../components/Breadcrumb.vue";

export default {
    name: "Companies",
    components: {
        Breadcrumb,
    },
    data() {
        return {
            loading: false, // Track loading state
            error: null, // Track error state
        };
    },
};
</script>

<style>
.error {
    color: red;
}
</style>
