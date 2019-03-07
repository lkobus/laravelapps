import axios from 'axios';

const profile = {
  namespaced : true,
  state: {
    token: '',
    auth: {
        id : 0,
        name : '',
        email : '',
        photo : ''
        
    },
    info: {
        name : '',
        file : '',
        lastname : '',
        birthday : '',
        position : '',
    }    
  },
  mutations: {
    increment:  (state, payload) => {
      state.count = payload;
    },
    saveToken: (state, payload) => {      
      state.token = payload;
    },
  },
  actions: {
      async auth ({commit}, payload) {
        

        var bodyFormData = new FormData();
        bodyFormData.set("email", payload.email);
        bodyFormData.set("password", payload.password);
        return axios({
          method: 'post',
          url: '/api/login',
          data: bodyFormData,
          config: { headers : { 'Content-Type' : 'form-data'}}
        }).then(function(response){        
          var token = response.data.success.token;
          commit('saveToken', token);          
          return { error : false, response : response};
        }).catch(function(e){                    
          return { error : true, message : 'email or password invalid.' }          
        });
      },
      
  }
}

export default profile;