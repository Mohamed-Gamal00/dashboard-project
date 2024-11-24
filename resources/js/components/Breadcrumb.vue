<template>
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">
                    {{ title }}
                </h2>
                <p class="mg-b-0">{{ subtitle }}</p>
            </div>

            <div class="my-auto">
                <div class="d-flex">
                    <template
                        v-for="(crumb, index) in breadcrumbs"
                        :key="index"
                    >
                        <router-link
                            v-if="crumb.route"
                            :to="crumb.route"
                            class="content-title mb-0 my-auto text-primary"
                        >
                            {{ crumb.label }}
                        </router-link>
                        <span v-else class="content-title mb-0 my-auto">
                            {{ crumb.label }}
                        </span>
                        <span
                            v-if="index < breadcrumbs.length - 1"
                            class="text-muted mt-1 tx-13 mx-1 mb-0"
                        >
                            /
                        </span>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Breadcrumb",
    props: {
        title: {
            type: String,
            required: true,
        },
        subtitle: {
            type: String,
            required: true,
        },
        breadcrumbs: {
            type: Array,
            required: true,
            default: () => [],
        },
    },
};
</script>
