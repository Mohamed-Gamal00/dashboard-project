import { createStore } from "vuex";

export default createStore({
    state: {
        authToken: localStorage.getItem("auth_token") || null,
        user: localStorage.getItem("user")
            ? JSON.parse(localStorage.getItem("user"))
            : null,
        name: "mohamed gamal",
        title: "back end",
        products: "",
    },
    // زي الكومبيوتد في  اللوكال كومبوننت بتاعي بعمل فيها عملبة حسابية فدورها اما تجيب الداتا بس او تجيب الداتا معمول عليها عملية حسابية بتقبل فنكشن ولازم اعملها ريترن
    // ممكن فيها ارجع الستيت بس او ارجع الستيت معمول عليها عملية حسابية
    // this.$store.getters.getNameWithTitle  دي الطريقة اللي بنده عليها في الكومبوننت بتاعي
    getters: {
        getUser(state) {
            // بمرر ارجيومنت اللي هو اللي استيت اللي هعمل عليه العملية
            return state.user
        },
    },

    // دورها انها بتتحكم في الستيت بتاعي يعني لو عندي ستيت عاوز اغير قيمته بعد ما انفذ اكشن معين بستخدمها
    // this.$store.commit('name of commit')
    mutations: {
        setAuthToken(state, token) {
            state.authToken = token; // Set auth token
        },
        setUser(state, user) {
            state.user = user; // Set user data
            console.log(user);
        },
        clearAuth(state) {
            state.authToken = null; // Clear auth token
            state.user = null; // Clear user data
        },
        getProducts(state, products) {
            // products arrgument دي ديناميك داتا هتتمرر للميوتيشن عشان تتعرض في الستيت
            state.products = products;
        },
    },
    //    api calls and async data بنده فيها علي ال اي بي اي مسؤولة عن ال
    // this.$store.dispatch('name of action function')
    actions: {
        saveAuthToken({ commit }, token) {
            localStorage.setItem("auth_token", token);
            commit("setAuthToken", token);
        },
        saveUser({ commit }, user) {
            localStorage.setItem("user", JSON.stringify(user));
            commit("setUser", user);
        },
        clearAuth({ commit }) {
            commit("clearAuth"); // Clear user data and token from state
        },
        async getProdcnts(context) {
            // عشان امرر ميوتيشن جوا  الفنكشن لازم امرر ارجيومينت متعارف عليه اسمه كونتكست
            await fetch("http://dummyjson/products")
                .then((res) => res.json())
                .then((data) => {
                    context.commit("getProducts", data.products);
                });
        },
    },
    // دي المكان اللي ههندل منه الفايلز اللي هعملها خارج الاندكس بنظم من خلاله الفايلز الخارجية
    /*
        store/getProducts.js
        import name_of_file from "@/store/getProducts"
    */
    // modules: {
    //     name_of_file,
    // },
});
