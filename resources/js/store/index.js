import { createStore } from 'vuex';

export default createStore({
  state: {
    authToken: null, // Store auth token
    user: null, // Store user data
  },
  getters: {
    authToken: state => state.authToken, // Get auth token
    user: state => state.user, // Get user data
  },
  mutations: {
    setAuthToken(state, token) {
      state.authToken = token; // Set auth token
    },
    setUser(state, user) {
      state.user = user; // Set user data
    },
    clearAuth(state) {
      state.authToken = null; // Clear auth token
      state.user = null; // Clear user data
    },
  },
  actions: {
    saveAuthToken({ commit }, token) {
      commit('setAuthToken', token); // Save token to state
    },
    saveUser({ commit }, user) {
      commit('setUser', user); // Save user data to state
    },
    clearAuth({ commit }) {
      commit('clearAuth'); // Clear user data and token from state
    },
  },
  modules: {},
});
