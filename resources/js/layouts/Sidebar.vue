<template>
    <router-link to="/">
        <div class="main-sidebar-header active">
            <a class="desktop-logo logo-light active"
                ><img
                    src="/dashboard/assets/img/brand/logo.png"
                    class="main-logo"
                    alt="logo"
            /></a>
            <a class="desktop-logo logo-dark active"
                ><img
                    src="/dashboard/assets/img/brand/logo-white.png"
                    class="main-logo dark-theme"
                    alt="logo"
            /></a>
            <a class="logo-icon mobile-logo icon-light active"
                ><img
                    src="/dashboard/assets/img/brand/favicon.png"
                    class="logo-icon"
                    alt="logo"
            /></a>
            <a class="logo-icon mobile-logo icon-dark active"
                ><img
                    src="/dashboard/assets/img/brand/favicon-white.png"
                    class="logo-icon dark-theme"
                    alt="logo"
            /></a>
        </div>
    </router-link>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img
                        alt="user-img"
                        class="avatar avatar-xl brround"
                        src="/dashboard/assets/img/faces/6.jpg"
                    /><span
                        class="avatar-status profile-status bg-green"
                    ></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">
                        {{ this.$store.getters.getUser.name }}
                    </h4>
                    <span class="mb-0 text-muted">admin</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">Main</li>
            <li class="slide">
                <a class="side-menu__item"
                    ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="side-menu__icon"
                        viewBox="0 0 24 24"
                    >
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z"
                            opacity=".3"
                        />
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"
                        />
                    </svg>
                    <span class="side-menu__label">Index</span
                    ><span class="badge badge-success side-badge">1</span></a
                >
            </li>

            <li class="side-item side-item-category">WEB APPS</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"
                    ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="side-menu__icon"
                        viewBox="0 0 24 24"
                    >
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z"
                            opacity=".3"
                        />
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z"
                        />
                    </svg>

                    <span class="side-menu__label">Apps</span
                    ><i class="angle fe fe-chevron-down"></i
                ></a>
                <ul class="slide-menu">
                    <li>
                        <router-link class="slide-item" to="/home">
                            Home
                        </router-link>
                    </li>
                    <li>
                        <router-link class="slide-item" to="/companies">
                            Company
                        </router-link>
                    </li>
                    <li><a class="slide-item" href="cards.html">Cards</a></li>
                    <li>
                        <a class="slide-item" href="darggablecards.html"
                            >Darggablecards</a
                        >
                    </li>
                    <li>
                        <a class="slide-item" href="rangeslider.html"
                            >Range-slider</a
                        >
                    </li>
                    <li>
                        <a class="slide-item" href="calendar.html">Calendar</a>
                    </li>
                    <li>
                        <a class="slide-item" href="contacts.html">Contacts</a>
                    </li>
                    <li>
                        <a class="slide-item" href="image-compare.html"
                            >Image-compare</a
                        >
                    </li>
                    <li>
                        <a class="slide-item" href="notification.html"
                            >Notification</a
                        >
                    </li>
                    <li>
                        <a class="slide-item" href="widget-notification.html"
                            >Widget-notification</a
                        >
                    </li>
                    <li>
                        <a class="slide-item" href="treeview.html">Treeview</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</template>

<script></script>

<style></style>
