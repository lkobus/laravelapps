const GlobalStore = {
  namespaced : true,
  state: {
      loading: false,
      message : 'Loading...'
  },
  mutations: {
    startLoad: (state, payload) => {
        console.log("Loading true");
        state.loading = true;
        state.message = payload;
    },
    stopLoad: (state, payload) => {
        console.log("Loading false");
        state.loading = false;
        state.message = 'Loading...';
    }
  },
  actions: {      
    startLoad: ({commit}, payload) => {
        commit('startLoad', payload);
    },
    stopLoad: ({commit}, payload) => {
        commit('stopLoad', payload);        
    }
  }
}

export default GlobalStore;