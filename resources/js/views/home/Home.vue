<template>
    <div>
        <Breadcrumb
            :breadcrumbs="[
                { label: 'الرئيسية', route: '/' },
                { label: 'المنزل', route: '' }, // No route for the last item
            ]"
        />
        <h1>Home Page</h1>
    </div>
</template>

<script>
import Breadcrumb from "../../components/Breadcrumb.vue";
export default {
    components: {
        Breadcrumb,
    },
    name: "Home",
};
</script>
