<template>
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <template v-for="(crumb, index) in breadcrumbs" :key="index">
                    <span class="content-title mb-0 my-auto card-title" v-if="crumb.route">
                        <router-link :to="crumb.route" class="content-title mb-0 my-auto text-primary">
                            {{ crumb.label }}
                        </router-link>
                    </span>
                    <span v-else class="content-title mb-0 my-auto card-title">
                        {{ crumb.label }}
                    </span>

                    <!-- <span class="content-title mb-0 my-auto">
                            {{ crumb.label }}
                        </span> -->
                    <span v-if="index < breadcrumbs.length - 1" class="text-muted mt-1 tx-13 mx-1 mb-0"> / </span>
                </template>
            </div>
        </div>

        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0" v-if="is_AddButton_exist">
                <router-link :to="{ name: addButtonRoute }" class="content-title mb-0 my-auto text-primary">
                    <button type="button" class="btn btn-success btn-icon ml-2">
                        <i class="mdi mdi-plus"></i>
                    </button>
                </router-link>
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
            required: null,
        },
        is_AddButton_exist: {
            type: Boolean,
            required: false,
            default: false,
        },
        addButtonRoute: {
            type: String,
            required: false,
            default: "",
        },
        breadcrumbs: {
            type: Array,
            required: null,
            default: () => [],
        },
    },
};
</script>
