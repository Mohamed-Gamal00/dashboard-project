<template>
    <div class="row row-xs align-items-center mg-b-20">
        <div class="col-md-2">
            <h5>
                <label v-if="label" :for="name" class="form-label card-title">{{ label }}</label>
            </h5>
        </div>
        <div class="col-md-10 mg-t-5 mg-md-t-0">
            <div v-if="type !== 'file'">
                <input
                    :type="type"
                    :name="name"
                    :id="name"
                    :value="modelValue"
                    @input="$emit('update:modelValue', $event.target.value)"
                    class="form-control"
                    :class="[customClass]"
                    style="direction: rtl"
                    v-bind="$attrs"
                />
                <span v-if="errorMessage" class="invalid-feedback d-block">
                    {{ errorMessage }}
                </span>
            </div>

            <!-- File input for image -->
            <div v-else>
                <input type="file" :name="name" :id="name" @change="previewImage" class="form-control" :class="[{ 'is-invalid': errorMessage }, customClass]" style="direction: rtl" accept="image/*" />

                <!-- Show image preview -->
                <div v-if="imagePreview || modelValue" class="mt-2">
                    <img :src="imagePreview || modelValue" alt="Preview" class="img-thumbnail" style="max-width: 150px; max-height: 150px" />
                </div>
                <div v-if="errorMessage" class="invalid-feedback">
                    {{ errorMessage }}
                </div>
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
