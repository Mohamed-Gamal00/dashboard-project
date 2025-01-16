<template>
    <div class="row no-gutter">
        <!-- The image half -->
        <div
            class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent"
        >
            <div class="row wd-100p mx-auto text-center">
                <div
                    class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p"
                >
                    <img
                        src="/dashboard/assets/img/media/forgot.png"
                        class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto"
                        alt="logo"
                    />
                </div>
            </div>
        </div>
        <!-- The content half -->
        <div class="col-md-6 col-lg-6 col-xl-5">
            <div class="login d-flex align-items-center py-2">
                <!-- Demo content-->
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                            <div class="mb-5 d-flex">
                                <a href="index.html">
                                    <img
                                        src="/dashboard/assets/img/brand/favicon.png"
                                        class="sign-favicon ht-40"
                                        alt="logo"
                                    />
                                </a>
                                <h1 class="main-logo1 mr-1 mr-0 my-auto tx-28">
                                    Va<span>le</span>x
                                </h1>
                            </div>
                            <div class="main-card-signin d-md-flex">
                                <div class="wd-100p">
                                    <div class="main-signin-header">
                                        <h2>Login</h2>
                                        <form @submit.prevent="login">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input
                                                    class="form-control"
                                                    placeholder="Enter your email"
                                                    v-model="email"
                                                    type="text"
                                                    required
                                                />
                                            </div>

                                            <div>
                                                <label for="password"
                                                    >Password</label
                                                >
                                                <input
                                                    type="password"
                                                    class="form-control"
                                                    placeholder="Enter your password"
                                                    id="password"
                                                    v-model="password"
                                                    required
                                                />
                                            </div>
                                            <button
                                                class="btn btn-main-primary btn-block"
                                                :disabled="loading"
                                            >
                                                <span v-if="loading"
                                                    >Loading...</span
                                                >
                                                <span v-else>Send</span>
                                            </button>
                                        </form>
                                    </div>
                                    <div
                                        v-if="error"
                                        class="alert alert-danger mt-3"
                                    >
                                        {{ error }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
        <!-- End -->
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            email: "admin@admin.com",
            password: "12345678",
            loading: false,
            error: null,
        };
    },
    methods: {
    async login() {
        this.loading = true;
        this.error = null;
        try {
            const response = await axios.post("/api/v1/login", {
                email: this.email,
                password: this.password,
            });

            // Extract token and user data
            const token = response.data.token;
            const user = response.data.admin;

            // Save token and user in Vuex (also persists in localStorage)
            this.$store.dispatch("saveAuthToken", token);
            this.$store.dispatch("saveUser", user);

            // Redirect to the admin dashboard
            this.$router.push("/");
        } catch (err) {
            this.error =
                err.response?.data?.message ||
                "An error occurred. Please try again.";
        } finally {
            this.loading = false;
        }
    },
},

};
</script>
