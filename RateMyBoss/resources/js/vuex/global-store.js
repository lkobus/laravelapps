import axios from 'axios';

const GlobalStore = {
  namespaced : true,
  state: {
      loading: false,
      message : 'Loading...',
      UI : {
        alert : {
            message : '',
            show : false
        },
        menus : []
      }
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
    },
    showAlert: (state, payload) => {
        state.UI.alert.message = payload;
        state.UI.alert.show = true;
    },
    hideAlert: (state, payload) => {
        state.UI.alert.message = '';
        state.UI.alert.show = false;
    },
    setMenu: (state, payload) => {
        state.UI.menus = payload;        
    },
    setActiveMenu: (state, payload) => {
        for(var i in state.UI.menus){
            var current = state.UI.menus[i];
            if(i.route === payload){
                state.UI.menus[i].active = true;
            } else {
                state.UI.menus[i].active = false;
            }
        }
    }
  },
  actions: {      
    startLoad: ({commit}, payload) => {
        commit('startLoad', payload);
    },
    stopLoad: ({commit}, payload) => {
        commit('stopLoad', payload);        
    },
    showAlert: ({commit}, payload) => {
        commit('showAlert', payload);
    },
    hideAlert: ({commit}, payload) => {
        commit('hideAlert', payload);
    },
    async loadMenus (context, payload) {
        return axios.get('/api/menus', { 
            headers : {
              Authorization : "Bearer " + context.rootState.profile.token 
            }
          })
          .then(function(r){      
              context.commit('setMenu', r.data);
            return { error : false };
          }).catch(function(r){          
            return { error : true, message: r};
          });
    }
  }
}

export default GlobalStore;