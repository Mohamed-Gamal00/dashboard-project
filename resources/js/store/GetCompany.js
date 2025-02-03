export default {
    state: {
        company: "",
    },
    mutations: {
        getcompany(state, company) {
            state.company = company;
        },
    },
    actions: {
        async geCompany({ commit }) {
            try {
                const response = await axios.get("/api/v1/companies");
                commit("getcompany", response.data.data); // Commit the data to the state
            } catch (err) {
                console.error(
                    err.response?.data?.message ||
                        "An error occurred while fetching data."
                );
            }
        },
    },
};
