<script>
export default {
    name: "Alert",
    props: {
        type: {
            type: String,
            default: "primary",
        },
        message: {
            type: String,
            required: true,
        },
        timeout: {
            type: Number,
            default: null, // No timeout by default
        },
    },
    data() {
        return {
            visible: true,
        };
    },
    mounted() {
        if (this.timeout) {
            setTimeout(() => {
                this.visible = false;
            }, this.timeout);
        }
    },
};
</script>

<template>
    <div v-if="visible" :class="`alert alert-${type} w-100 rounded`" role="alert">
        {{ message }}
    </div>
</template>

<style>
/* Optional: Add custom styles if needed */
</style>
