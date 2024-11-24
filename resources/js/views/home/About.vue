<template>
    <div>
        <Breadcrumb
            :breadcrumbs="[
                { label: 'Home', route: '/' },
                { label: 'home', route: '/hosme' },
                { label: 'about', route: '' }, // No route for the last item
            ]"
        />
        <router-link
            :to="{
                name: 'Home',
            }"
        >
            home
        </router-link>
        <h1>About Page</h1>
    </div>
</template>

<script>
import Breadcrumb from "../../components/Breadcrumb.vue";
export default {
    components: {
        Breadcrumb,
    },
    name: "About",
};
</script>
