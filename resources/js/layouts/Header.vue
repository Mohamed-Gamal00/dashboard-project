<template>
    <div class="container-fluid">
        <div class="main-header-left">
            <div class="responsive-logo">
                <a href="index.html"
                    ><img
                        src="/dashboard/assets/img/brand/logo.png"
                        class="logo-1"
                        alt="logo"
                /></a>
                <a href="index.html"
                    ><img
                        src="/dashboard/assets/img/brand/logo-white.png"
                        class="dark-logo-1"
                        alt="logo"
                /></a>
                <a href="index.html"
                    ><img
                        src="/dashboard/assets/img/brand/favicon.png"
                        class="logo-2"
                        alt="logo"
                /></a>
                <a href="index.html"
                    ><img
                        src="/dashboard/assets/img/brand/favicon.png"
                        class="dark-logo-2"
                        alt="logo"
                /></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"
                    ><i class="header-icon fe fe-align-left"></i
                ></a>
                <a class="close-toggle" href="#"
                    ><i class="header-icons fe fe-x"></i
                ></a>
            </div>
            <div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
                <input
                    class="form-control"
                    placeholder="Search for anything..."
                    type="search"
                />
                <button class="btn">
                    <i class="fas fa-search d-none d-md-block"></i>
                </button>
            </div>
        </div>
        <div class="main-header-right">
            <div class="nav nav-item navbar-nav-right ml-auto">
                <div class="nav-link" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Search"
                            />
                            <span class="input-group-btn">
                                <button type="reset" class="btn btn-default">
                                    <i class="fas fa-times"></i>
                                </button>
                                <button
                                    type="submit"
                                    class="btn btn-default nav-link resp-btn"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="header-icon-svgs feather feather-search"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line
                                            x1="21"
                                            y1="21"
                                            x2="16.65"
                                            y2="16.65"
                                        ></line>
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>

                <div class="dropdown nav-item main-header-notification">
                    <a class="new nav-link" href="#" data-toggle="dropdown">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="header-icon-svgs"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path
                                d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"
                            ></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                        <span class="pulse"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                                <h6
                                    class="dropdown-title mb-1 tx-15 text-white font-weight-semibold"
                                >
                                    Notifications
                                </h6>
                                <span
                                    class="badge badge-pill badge-warning mr-auto my-auto float-left"
                                    >Mark All Read</span
                                >
                            </div>
                            <p
                                class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12"
                            >
                                You have 4 unread Notifications
                            </p>
                        </div>
                        <div
                            class="main-notification-list Notification-scroll ps"
                        >
                            <a class="d-flex p-3 border-bottom" href="#">
                                <div class="notifyimg bg-pink">
                                    <i class="la la-file-alt text-white"></i>
                                </div>
                                <div class="mr-3">
                                    <h5 class="notification-label mb-1">
                                        New files available
                                    </h5>
                                    <div class="notification-subtext">
                                        10 hour ago
                                    </div>
                                </div>
                                <div class="mr-auto">
                                    <i
                                        class="las la-angle-left text-left text-muted"
                                    ></i>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-footer">
                            <a href="">VIEW ALL</a>
                        </div>
                    </div>
                </div>
                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#"
                        ><svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="header-icon-svgs feather feather-maximize"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"
                            ></path>
                        </svg>
                    </a>
                </div>
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href=""
                        ><img alt="" src="/dashboard/assets/img/faces/6.jpg"
                    /></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user">
                                    <img
                                        alt=""
                                        src="/dashboard/assets/img/faces/6.jpg"
                                        class=""
                                    />
                                </div>
                                <div class="mr-3 my-auto">
                                    <h6>
                                        {{ this.$store.getters.getUser.name }}
                                    </h6>
                                    <span>admin</span>
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href=""
                            ><i class="bx bx-user-circle"></i>Profile</a
                        >
                        <a class="dropdown-item" href=""
                            ><i class="bx bx-cog"></i> Edit Profile</a
                        >
                        <a class="dropdown-item" href=""
                            ><i class="bx bxs-inbox"></i>Inbox</a
                        >
                        <a class="dropdown-item" href=""
                            ><i class="bx bx-envelope"></i>Messages</a
                        >
                        <a class="dropdown-item" href=""
                            ><i class="bx bx-slider-alt"></i> Account
                            Settings</a
                        >
                        <button @click="logout" class="btn btn-danger">
                            Logout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    methods: {
        async logout() {
            try {
                await axios.post("/api/v1/logout");

                // Clear token from localStorage
                localStorage.removeItem("auth_token");

                // Redirect to login page
                this.$router.push("/login");
            } catch (err) {
                console.error("Logout failed:", err);
            }
        },
    },
};
</script>

<style></style>
