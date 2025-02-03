<template>
    <div class="row row-xs align-items-center mg-b-20">
        <div class="col-md-2">
            <h5>
                <label v-if="label" :for="name" class="form-label">{{ label }}</label>
            </h5>
        </div>
        <div class="col-md-10 mg-t-5 mg-md-t-0">
            <input
                v-if="type !== 'file'"
                :type="type"
                :name="name"
                :id="name"
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
                class="form-control"
                :class="[{ 'is-invalid': errorMessage }, customClass]"
                style="direction: rtl"
                v-bind="$attrs"
            />

            <!-- File input for image -->
            <input
                v-else
                type="file"
                :name="name"
                :id="name"
                @change="previewImage"
                class="form-control"
                :class="[{ 'is-invalid': errorMessage }, customClass]"
                style="direction: rtl"
                accept="image/*"
            />

            <!-- Show image preview -->
            <div v-if="imagePreview" class="mt-2">
                <img :src="imagePreview" alt="Preview" class="img-thumbnail" style="max-width: 150px; max-height: 150px;" />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: "text",
        },
        modelValue: {
            type: [String, Number, File],
            default: "",
        },
        name: {
            type: String,
            required: true,
        },
        label: {
            type: String,
            default: "",
        },
        errorMessage: {
            type: String,
            default: "",
        },
        customClass: {
            type: String,
            default: "",
        },
    },
    data() {
        return {
            imagePreview: null,
        };
    },
    methods: {
        previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                this.$emit("update:modelValue", file);
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.imagePreview = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                this.imagePreview = null;
            }
        },
    },
};
</script>

<style scoped>
.img-thumbnail {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
}
</style>
