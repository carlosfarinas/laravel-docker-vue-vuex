import Vue from "vue"
import Vuex from "vuex"

Vue.use(Vuex);
//import currentUser from "./modules/currentUser";



const store = new Vuex.Store({
    state: {
        count: 0,
    },
    mutations: {
      INCREMENT(state) {
          state.count++
      },
    },
    actions: {}

});

export default store;
