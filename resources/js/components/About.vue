<template>
    <div>
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
export default {
    name: "About",
};
</script>
