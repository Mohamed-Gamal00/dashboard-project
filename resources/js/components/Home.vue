<template>
    <div>
        <router-link
            :to="{
                name: 'About',
            }"
        >
            about
        </router-link>
        <h1>Home Page</h1>
    </div>
</template>

<script>
export default {
    name: "Home",
};
</script>
